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

        .error {
            color: red;
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
                        <button id="btnAddLanguage" class="btn btn-primary btn-icon-split float-right" data-toggle="modal"
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
                                    <th scope="col">{{trans('messages.Code')}}</th>
                                    <th scope="col">{{trans('messages.name')}}</th>
                                    <th scope="col">{{trans('messages.image')}}</th>
                                    <th scope="col" style="width: 100px" class="text-center">{{trans('messages.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $language=App\Model\Language::orderBy('id','asc')->get();
                                @endphp
                                @foreach($language as $key=>$data)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$data['id']}}</td>
                                        <td>{{$data['name']}}</td>
                                        <td>{{$data['code']}}</td>
                                        <td>
                                            <img src="{{ asset('storage/app/public/language') }}/{{ $data['image'] }}" alt="" width="32px">
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
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="text-align:center;">
                                                    <button class="btn btn-icon-split dropdown-item" data-toggle="modal" data-target="#lang-modal" onclick="editLanguage('{{ route('admin.business-settings.language.edit_language') }}',
                                                    {{ $data['id'] }})" >
                                                        {{trans('messages.Edit')}}
                                                    </button>
                                                    <button class="dropdown-item" onclick="deleteLanguage({{ $data['id'] }})">
                                                        {{trans('messages.Delete')}}
                                                    </button>
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
                        <h5 class="modal-title" id="formLanguageTitle">{{trans('messages.new_language')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="sign_up_language" action="{{route('admin.business-settings.language.add_new_language')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name"
                                    class="col-form-label force">{{trans('messages.language')}} </label>
                                <input type="text" class="form-control" id="txtName" name="name">
                            </div>
                            <div class="form-group">
                                <label for="message-text"
                                    class="col-form-label force">{{trans('messages.language_code')}}</label>
                                <input type="text" class="form-control" id="txtCode" name="code">
                            </div>
                            <div class="form-group">
                                <div>
                                    <label for="message-text" class="col-form-label">{{trans('messages.image')}}</label>
                                </div>
                                <center>
                                    <img width="200" id="viewerImg"
                                    onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                    >
                                </center>
                                <div class="col-12">
                                    <input type="file" name="image" id="customFileUpload" class="custom-file-input" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                    <label class="custom-file-label" for="customFileUpload">{{trans('messages.choose')}} {{trans('messages.file')}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{trans('messages.close')}}</button>
                            <button type="submit" id="btnInsertLanguage" class="btn btn-primary">{{trans('messages.Add')}} <i
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
            setForce("#lang-modal .modal-body");
        });

        $('#btnAddLanguage').on('click', function(){
            $('#formLanguageTitle').html('{{trans('messages.new_language')}}');
            $('#btnInsertLanguage').html('{{trans('messages.add')}}');
        });

        function deleteLanguage(data) {
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
                        url: 'delete_language/' + data,
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

        function editLanguage(route, data){
            var dataJson = {
                language_id: data
            };
            // console.log("fafsd");
            // return;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: route,
                dataType: "json",
                data: dataJson,
                success: function(response){
                    // console.log(response);
                    if(response.statusCode==200){
                        $('#formLanguageTitle').html('{{trans('messages.update_language')}}');
                        $('#btnInsertLanguage').html('{{trans('messages.update')}}');
                        $('#txtName').val(response.language.name);
                        $('#txtCode').val(response.language.code);
                        $('#viewerImg').attr('src', response.language.image);
                    }
                },
                error: function(e){
                    console.log(e);
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
        $("#customFileUpload").change(function() {
            if(this.files && this.files[0]){
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#viewerImg').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }
        });
        // $('#lang-modal').on('hidden.bs.modal', function () {
        //     $('#viewerImg').removeAttr("src");
        //     $('#customFileUpload').val('');
        //     $('#txt_name').val('');
        //     $('#txt_code').val('');
        //     $("label.error").hide();
        // });
        $("#sign_up_language").validate({
            rules: {
                name: {
                    required: true
                },
                code: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: '{{trans('messages.require_name')}}'
                },
                code: {
                    required: '{{trans('messages.require_code')}}'
                }
            },
            submitHandle: function(form) {
                form.submit();
            }
        });
        function setForce(container){
            $('.force').map(function(){
                $(this).html($(this).html() + "<span style='color:red;'>(*)</span>");
            });
            $(container).append('<div style="color: red">Note: (*) are force.</div>');
        }
    </script>
@endpush
