@extends('layouts.back-end.app')
@section('title','App Language Translate')
@push('css_or_js')
    <!-- Custom styles for this page -->
    <link href="{{asset('public/assets/back-end')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 48px;
            height: 23px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #4af3ce;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #60f3ca;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

    </style>
@endpush

@section('content')
<div class="content container-fluid">
    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('messages.Dashboard')}}</a></li>
            <li class="breadcrumb-item" aria-current="page">{{trans('messages.translate_app_language')}}</li>
        </ol>
    </nav>

    <div class="row" style="margin-top: 20px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{trans('messages.language_content_table')}}</h5>
                    <div>
                        <span>Sync language</span>
                        <span>
                            @php
                                $language1=App\Model\BusinessSetting::where('type','app_language')->first();
                            @endphp
                            <select name="language_sel" id="language_sel">
                            @foreach(json_decode($language1['value'],true) as $key =>$data)
                                <option value="{{$data['code']}}">{{$data['code']}}-{{$data['name']}}</option>
                            @endforeach
                            </select>
                        </span>
                        <span>
                            <button type="button" onclick="syncLanguage()">Sync</button>
                        </span>
                        <span>
                            <input type="checkbox" id="sync_all_values" name="sync_all_values">
                            <label for="sync_all_values">Sync all values</label>
                        </span>
                    </div>
                    <a href="{{route('admin.business-settings.app-language.index')}}" class="btn btn-sm btn-danger btn-icon-split float-right">
                        <span class="text text-capitalize">{{trans('messages.back')}}</span>
                    </a>
                </div>
                <form action="{{route('admin.business-settings.app-language.translate-submit',[$lang])}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th scope="col">{{trans('messages.SL#')}}</th>
                                    <th scope="col">{{trans('messages.key')}}</th>
                                    <th scope="col">{{trans('messages.value')}}</th>
                                </tr>
                                </thead>
                                @php
                                    $array = include(base_path('resources/app-lang/'.$lang.'/messages.php'));
                                @endphp

                                <tbody>
                                @php($count=0)
                                @foreach($array as $key=>$language)
                                    <tr>
                                        <td>{{++$count}}</td>
                                        <td>
                                            <input type="text" name="key[]" value="{{$key}}" hidden>
                                            <label>{{$key}}</label>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="value[]" value="{{$language}}">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">
                                            <input type="button" onclick="addNewTranslation()" class="btn btn-primary" value="Add new key, value">
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer">
                        <center>
                            <button class="btn btn-primary pull-right btn-block" type="submit">Update</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <!-- Page level plugins -->
    <script src="{{asset('public/assets/back-end')}}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('public/assets/back-end')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function () {
            $('#dataTable').DataTable({
                "pageLength": 1000
            });
        });

        function addNewTranslation() {
            var newTr = `
                <tr>
                    <td></td>
                    <td>
                        <input type="text" class="form-control" name="key[]" value="" placeholder="Key name">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="value[]" value="" placeholder="Value">
                    </td>
                </tr>
            `;
            $('#dataTable tbody').append(newTr);
            // console.log(newTr);
        }

        $(document).on('change', '.status', function () {
            var id = $(this).attr("id");
            if ($(this).prop("checked") == true) {
                var status = 1;
            } else if ($(this).prop("checked") == false) {
                var status = 0;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('admin.product.status-update')}}",
                method: 'POST',
                data: {
                    id: id,
                    status: status
                },
                success: function () {
                    toastr.success('Status updated successfully');
                }
            });
        });
        
        function syncLanguage(){
            Swal.fire({
                title: 'Are you sure?',
                text: 'Bạn có muốn đồng bộ dữ liệu',
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: 'default',
                confirmButtonColor: '#377dff',
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
                reverseButtons: true
            }).then((result) => {
                // alert($('#sync_all_values').is(":checked"));
                // return;
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    var language_id = "{{$lang}}";
                    $.ajax({
                        url: "{{route('admin.business-settings.app-language.translate-sync')}}",
                        method: 'POST',
                        data: {
                            language_id: language_id,
                            language_sel_id: $('#language_sel').val(),
                            sync_all_values: $('#sync_all_values').is(":checked")
                        },
                        success: function (response) {
                            // console.log(response);
                            toastr.success('Status updated successfully');
                            location.reload();
                        }
                    });
                }
            })
        }
    </script>

@endpush
