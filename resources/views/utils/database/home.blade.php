@extends('utils.home')

@section('title','Utils Database')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Getting structure and data from database</div>
                <form id="frm_connection_info">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Type of connection</label>
                            <select name="selTypeOfConnection" id="selTypeOfConnection" class="form-control">
                                <option value="mysql">MySQL</option>
                                <option value="sqlserver">SQL Server</option>
                                <option value="oracle">Oracle</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Host</label>
                            <input type="text" id="txtHost" name="host" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Port</label>
                            <input type="text" id="txtPort" name="port" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Database</label>
                            <input type="text" id="txtDatabase" name="database" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" id="txtUserName" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <div>
                                <input id="txtPassword" type="password" name="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Service name</label>
                            <input type="text" id="txtServiceName" name="servicename" class="form-control">
                        </div>
                        <div class="form-group">
                            <div>
                                <label style="margin-right: 20px;">Tables in DB</label>
                                <span>
                                    <input type="checkbox" name="chk_all" id="chk_all">
                                    <label>Select All</label>
                                </span>
                            </div>
                            <div style="display: flex;">
                                <select name="table_names[]" id="sel_table_names" onchange="$('#alert_box').show();"
                                        data-maximum-selection-length="3" class="form-control js-select2-custom"
                                        required multiple=true>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap">
                            <button type="button" id="btnTestConnection" class="btn btn-primary m-1">Test connection</button>
                            <button type="button" id="btnSaveConnection" class="btn btn-primary m-1">Save connection</button>
                            <button type="button" id="btnLoadTables" class="btn btn-primary m-1">Load tables</button>
                            <button type="button" id="btnDownloadMigrationFiles" class="btn btn-primary m-1">Download Migration files</button>
                            <button type="button" id="btnDownloadSeedFiles" class="btn btn-primary m-1">Download Seed files</button>
                            <a id="download" style="display:none;">Download</a>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        $("#chk_all").click(function(){
            if($("#chk_all").is(':checked') ){
                $("#sel_table_names > option").prop("selected","selected");// Select All Options
            }
            else{
                $("#sel_table_names > option").removeAttr("selected");
            }
            $("#sel_table_names").trigger("change");// Trigger change to select 2
        });
        $(".js-select2-custom").select2({
            theme: "classic"
        });
        function validate_connection_data() {
            var err = "";
            var txtHost = $('#txtHost').val().trim();
            var txtUserName = $('#txtUserName').val().trim();
            if(txtHost == "") {
                err = "Vui long nhap Host";
            }
            else if(txtUserName == "") {
                err = "Vui long nhap Username";
            }
            if(err != "") {//Have some errors
                toastr.error(err);
                return false;
            }
            return true;
        }
        $('#btnTestConnection').click(() => {
            callAjax('{{route('utils.database.check_connection')}}');
        });

        function callAjax($url) {
            //Check validate of data => call Ajax if it's valid
            if(validate_connection_data()) {
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                $.post({
                    url: $url,
                    data: {
                        type: $('#selTypeOfConnection').val(),
                        host: $('#txtHost').val(),
                        port: $('#txtPort').val(),
                        database: $('#txtDatabase').val(),
                        username: $('#txtUserName').val(),
                        password: $('#txtPassword').val(),
                        servicename: $('#txtServiceName').val()
                    },
                    beforeSend: function() {
                        $('#loading').show();
                    },
                    success: function(response) {
                        // console.log(response);
                        if(response.success == 1) {
                            toastr.success(response.message);
                        }
                        else {
                            toastr.error(response.message);
                        }
                        // location.reload();
                    },
                    complete: function() {
                        $('#loading').hide();
                    }
                });
            }
        }
        $('#btnSaveConnection').click(function() {
            callAjax('{{route('utils.database.save_connection')}}');
        });
        $('#selTypeOfConnection').on('change', () => {
            //Reset values
            $('#sel_table_names').html('');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.post({
                url: '{{route('utils.database.load_connection')}}',
                data: {
                    type: $('#selTypeOfConnection').val()
                },
                beforeSend: function() {
                    $('#loading').show();
                },
                success: function(response) {
                    // console.log(response);
                    if(response!="") {
                        $('#txtHost').val(response.host);
                        $('#txtPort').val(response.port);
                        $('#txtDatabase').val(response.database);
                        $('#txtUserName').val(response.username);
                        $('#txtPassword').val(response.password);
                        $('#txtServiceName').val(response.servicename);
                    }
                    // location.reload();
                },
                complete: function() {
                    $('#loading').hide();
                }
            });
        });
        $('#btnLoadTables').click(() => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.post({
                url: '{{route('utils.database.load_tables')}}',
                data: {
                    type: $('#selTypeOfConnection').val(),
                    host: $('#txtHost').val(),
                    port: $('#txtPort').val(),
                    database: $('#txtDatabase').val(),
                    username: $('#txtUserName').val(),
                    password: $('#txtPassword').val(),
                    servicename: $('#txtServiceName').val()
                },
                beforeSend: function() {
                    $('#loading').show();
                },
                success: function(response) {
                    // console.log(response);
                    if(response.success == 1) {
                        var data = response.data.reduce((arr, key) => (
                            [...arr, '<option value="'+ key +'">' + key + '</option>']
                            // return arr;
                        ), []).join('');
                        // console.log(data);
                        $('#sel_table_names').html(data);
                    }
                    else {
                        toastr.error(response.message);
                    }
                    // location.reload();
                },
                complete: function() {
                    $('#loading').hide();
                }
            });
        });

        $('#btnDownloadMigrationFiles').click(() => {
            var table_names = [];
            table_names = $('#sel_table_names').val();
            // console.log(table_names.length);
            if(table_names.length == 0) {
                Swal.fire({
                    text: '{{trans('messages.require_choose')}} tables !',
                    type: 'warning',
                    confirmButtonColor: '#377dff',
                    confirmButtonText: 'Yes',
                    reverseButtons: true
                });
                return;
            }
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to download files',
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: 'default',
                confirmButtonColor: '#377dff',
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
                reverseButtons: true
            }).then((result) => {

                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.post({
                        url: '{{route('utils.database.download_migration_files')}}',
                        data: $('#frm_connection_info').serialize(),
                        beforeSend: function() {
                            $('#loading').show();
                        },
                        success: function(response) {
                            if(response.success == 1) {
                                // toastr.success(response.message);
                                // var link=document.createElement('a');
                                // link.href=window.URL.createObjectURL(response.message);
                                // link.download='';
                                // link.click();
                                location.href = response.data;
                            }
                            else {
                                toastr.error(response.message);
                            }
                            // location.reload();
                        },
                        complete: function() {
                            $('#loading').hide();
                        }
                    });
                }

            });
        });
        
        $('#btnDownloadSeedFiles').click(() => {
            var table_names = [];
            table_names = $('#sel_table_names').val();
            // console.log(table_names.length);
            if(table_names.length == 0) {
                Swal.fire({
                    text: '{{trans('messages.require_choose')}} tables !',
                    type: 'warning',
                    confirmButtonColor: '#377dff',
                    confirmButtonText: 'Yes',
                    reverseButtons: true
                });
                return;
            }
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to download files',
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: 'default',
                confirmButtonColor: '#377dff',
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
                reverseButtons: true
            }).then((result) => {

                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.post({
                        url: '{{route('utils.database.download_seed_files')}}',
                        data: $('#frm_connection_info').serialize(),
                        beforeSend: function() {
                            $('#loading').show();
                        },
                        success: function(response) {
                            // console.log(response);
                            if(response.success == 1) {
                                // toastr.success(response.message);
                                location.href = response.data;
                            }
                            else {
                                toastr.error(response.message);
                            }
                            // location.reload();
                        },
                        complete: function() {
                            $('#loading').hide();
                        }
                    });
                }

            });
        });
    </script>
@endpush