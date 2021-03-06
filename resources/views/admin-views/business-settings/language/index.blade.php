@extends('layouts.back-end.app')
@section('title','Language')
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
            background-color: #377dff;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #377dff;
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
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('messages.Dashboard')}}</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">{{trans('messages.language_setting')}}</li>
            </ol>
        </nav>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{trans('messages.language_table')}}</h5>
                        <button class="btn btn-primary btn-icon-split float-right" data-toggle="modal"
                                data-target="#lang-modal">
                            <i class="tio-add-circle"></i>
                            <span class="text">{{trans('messages.add_new_language')}}</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="display table table-hover " style="width:100%">
                                <thead>
                                <tr>
                                    <th scope="col">{{ trans('messages.SL#')}}</th>
                                    <th scope="col">{{trans('messages.Id')}}</th>
                                    <th scope="col">{{trans('messages.name')}}</th>
                                    <th scope="col">{{trans('messages.Code')}}</th>
                                    <th scope="col">{{trans('messages.status')}}</th>
                                    <th scope="col" style="width: 100px" class="text-center">{{trans('messages.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $language=App\Model\BusinessSetting::where('type','language')->first();
                                    $default_language=App\Model\BusinessSetting::where('type','default_language')->first();
                                    $default_lang_code = "en";
                                    if(isset($default_language)){
                                        $default_lang_code = $default_language['value'];
                                    }
                                @endphp
                                @foreach(json_decode($language['value'],true) as $key =>$data)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$data['id']}}</td>
                                        <td>{{$data['name']}}</td>
                                        <td>{{$data['code']}}</td>
                                        <td>
                                            <label class="switch">
                                                @if($data['code']!=$default_lang_code)
                                                    <input type="checkbox"
                                                            onclick="updateStatus('{{route('admin.business-settings.app-language.update-status')}}','{{$data['code']}}')"
                                                            class="status" {{$data['status']==1?'checked':''}}>
                                                    <span class="slider round"></span>
                                                @else
                                                <label class="badge-soft-success">Default</label>
                                                @endif
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown float-right">
                                                <button class="btn btn-seconary btn-sm dropdown-toggle"
                                                        type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="tio-settings"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @if($data['code']!=$default_lang_code)
                                                        @if($data['status']==1)
                                                            <a class="dropdown-item"
                                                                href="{{route('admin.business-settings.language.set_default_language',[$data['code']])}}">{{trans('messages.default_language')}}
                                                            </a>
                                                        @endif
                                                        <button class="dropdown-item" onclick="deleteLanguage('{{route('admin.business-settings.language.delete',[$data['code']])}}')">
                                                            {{trans('messages.Delete')}}
                                                        </button>
                                                    @endif
                                                    <a class="dropdown-item"
                                                        href="{{route('admin.business-settings.language.translate',[$data['code']])}}">{{trans('messages.Translate')}}</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="lang-modal" tabindex="-1" role="dialog"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{trans('messages.new_language')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('admin.business-settings.language.add-new')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name"
                                       class="col-form-label">{{trans('messages.language')}} </label>
                                <input type="text" class="form-control" id="recipient-name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="message-text"
                                       class="col-form-label">{{trans('messages.language_code')}}</label>
                                <select class="form-control 1111" name="code">
                                    @php
                                        $lang = \App\Model\Language::orderBy('id','asc')->get();
                                        $imgPath = asset('storage/app/public/language');
                                    @endphp
                                    @foreach($lang as $key=>$data)
                                        <option value="{{$data['code']}}">
                                            {{$data['name']}} - {{$data['code']}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{trans('messages.close')}}</button>
                            <button type="submit" class="btn btn-primary">{{trans('messages.Add')}} <i
                                    class="fa fa-plus"></i></button>
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
            $('#dataTable').DataTable();
        });

        function deleteLanguage(route) {
            Swal.fire({
                title: 'Are you sure?',
                text: '{{trans('messages.confirm_data_delete')}}',
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
                    $.ajax({
                        type: "GET",
                        url: route,
                        success: function(response) {
                            // console.log(response);
                            if(response.statusCode==200) {
                                location.reload();
                            }
                        }
                    });
                }
            });
        }

        function updateStatus(route, code) {
            $.get({
                url: route,
                data: {
                    code: code,
                },
                success: function (data) {
                    /* console.log(data)*/
                    location.reload();
                }
            });
        }
    </script>
@endpush
