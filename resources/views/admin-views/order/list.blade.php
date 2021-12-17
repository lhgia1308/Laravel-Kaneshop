@extends('layouts.back-end.app')

@section('title','Order List')

@push('css_or_js')
<link href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css" rel="stylesheet">
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

        #banner-image-modal .modal-content {
            width: 1116px !important;
            margin-left: -264px !important;
        }

        @media (max-width: 768px) {
            #banner-image-modal .modal-content {
                width: 698px !important;
                margin-left: -75px !important;
            }


        }

        @media (max-width: 375px) {
            #banner-image-modal .modal-content {
                width: 367px !important;
                margin-left: 0 !important;
            }

        }

        @media (max-width: 500px) {
            #banner-image-modal .modal-content {
                width: 400px !important;
                margin-left: 0 !important;
            }
        }
        .inv_update_info {
            color: red;
            font-weight: bold;
        }
        .money_total {
            color: red;
            font-weight: bold;
        }
        table.dataTable thead th, table.dataTable thead td {
            /* padding: 10px; */
        }
        .btn_del_search {
            cursor: pointer;
            margin-right: 5px;
            background: #c0e9f1;
            padding: 3px 0px 3px 8px;
            text-align: center;
        }
        .btn_del_search i {
            color: red;
            font-size: 17px;
        }
        #datatable_wrapper .dt-buttons button {
            color: #fff;
            background-color: #1164ff;
            border-color: #045cff;
            margin: 7px;
        }
        .flex-container {
            display: flex;
            flex-direction: row;
        }
        .flex-container .margin_right {
            margin-right: 10px;
        }
    </style>
@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header mb-1">
            <div class="row align-items-center">
                <div class="col-sm">
                    <h1 class="page-header-title">{{trans('messages.Orders')}} <span
                            class="badge badge-soft-dark ml-2">{{$orders->total()}}</span></h1>
                </div>
                <div class="col-sm">
                    <i class="tio-shopping-cart float-right" style="font-size: 30px"></i>
                </div>
            </div>
            <!-- End Row -->

            <!-- Nav Scroller -->
            <div class="js-nav-scroller hs-nav-scroller-horizontal">
            <span class="hs-nav-scroller-arrow-prev" style="display: none;">
              <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                <i class="tio-chevron-left"></i>
              </a>
            </span>

                <span class="hs-nav-scroller-arrow-next" style="display: none;">
              <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                <i class="tio-chevron-right"></i>
              </a>
            </span>

                <!-- Nav -->
                <ul class="nav nav-tabs page-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Order List</a>
                    </li>
                </ul>
                <!-- End Nav -->
            </div>
            <!-- End Nav Scroller -->
        </div>
        <!-- End Page Header -->

        <!-- Card -->
        <div class="card">
            <!-- Header -->
            <div class="card-header">
                <div class="row flex-container" style="margin: 5px 0px 17px;">
                    <div class="margin_right">
                        @php
                            if(session()->has('order_list_statistic')) {
                                $data = session('order_list_statistic');
                            }
                            else {
                                $statistic = \App\Model\BusinessSetting::where('type', 'default_statistic_type')->first();
                                $data = 'current_day';
                                if(isset($statistic)) {
                                    $data = $statistic['value'];
                                }
                            }
                        @endphp
                        <select name="sel_statistic" id="sel_statistic" class="form-control">
                            <option value="all" {{$data=='all'?'selected':''}}>All</option>
                            <option value="current_day" {{$data=='current_day'?'selected':''}}>Current day</option>
                            <option value="current_month" {{$data=='current_month'?'selected':''}}>Current month</option>
                            <option value="current_year" {{$data=='current_year'?'selected':''}}>Current year</option>
                            <option value="option_day" {{$data=='option_day'?'selected':''}}>Option day</option>
                        </select>
                    </div>
                    <div class="div_option_day flex-container margin_right" style="{{$data != 'option_day'?'display:none':''}}">
                        <div class="margin_right">
                            <label for="">From day</label>
                            <input type="date" name="from_date" id="from_date" class="form-control" style="display: inline; width: auto;" value="{{session('from_day_statistic')}}">
                        </div>
                        <div class="flex-container margin_right">
                            <div class="margin_right">
                                <label for="">To day</label>
                                <input type="date" name="to_date" id="to_date" class="form-control" style="display: inline; width: auto;" value="{{session('to_day_statistic')}}">
                            </div>
                            <div>
                                <button type="button" class="btn btn-primary" onclick="filter_by_day()">Filter</button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <form action="javascript:">
                            <!-- Search -->
                            <div class="input-group input-group-merge input-group-flush">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tio-search"></i>
                                    </div>
                                </div>
                                
                                <!-- <select name="sel_search_field" id="sel_search_field" class="form-control" required="required">
                                    <option value="-1">All</option>
                                    <option value="2">Order No</option>
                                    <option value="3">Date</option>
                                    <option value="4">Customer</option>
                                    <option value="5">Status</option>
                                    <option value="7">Orders Status</option>
                                </select> -->
                                
                                <input id="datatableSearch" type="search" class="form-control"
                                       placeholder="Search orders" aria-label="Search orders 111" style="width: 400px;">
                                <span id="search_arr"></span>
                            </div>
                            <!-- End Search -->
                        </form>
                    </div>
                </div>
                <div class="row justify-content-between align-items-center flex-grow-1">
                    
                    <div class="col-lg-5">
                        <span>
                            <label for="">Status</label>
                            <select id="sel_status" name="sel_status" class="form-control" style="display: inline;width: auto;">
                                <option value="">--{{trans('messages.Choose')}}--</option>
                                <option value="unpaid">Unpaid</option>
                                <option value="paid">Paid</option>
                            </select>
                        </span>
                        <span style="margin-right: 10px;">
                            <label for="">Order Status</label>
                            <select id="sel_order_status" name="sel_order_status" class="form-control" style="display: inline;width: auto;">
                                <option value="">--{{trans('messages.Choose')}}--</option>
                                <option value="pending">Pending</option>
                                <option value="processing">Processing</option>
                                <option value="delivered">Delivered</option>
                                <option value="failed">Failed</option>
                            </select>
                        </span>
                        <span>
                            <button id="update_status" onclick="update_status()" form="frm_update_status" class="btn btn-primary">Update status</button>
                            <input type="hidden" id="currency_symbol" value="{{\App\CPU\BackEndHelper::currency_symbol()}}">
                            <input type="hidden" id="currency_position" value="{{\App\CPU\BackEndHelper::currency_position()}}">
                        </span>
                    </div>
                    <div class="col-lg-2">
                        <label> In-House orders only : </label>
                        <label class="switch ml-3">
                            <input type="checkbox" class="status"
                                   onclick="filter_order()" {{session()->has('show_inhouse_orders') && session('show_inhouse_orders')==1?'checked':''}}>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table id="datatable"
                       class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                       style="width: 100%"
                       data-hs-datatables-options='{
                     "columnDefs": [{
                        "targets": [0],
                        "orderable": false
                      }],
                     "order": [],
                     "info": {
                       "totalQty": "#datatableWithPaginationInfoTotalQty"
                     },
                     "search": "#datatableSearch",
                     "entries": "#datatableEntries",
                     "pageLength": 25,
                     "isResponsive": false,
                     "isShowPaging": false,
                     "pagination": "datatablePagination"
                   }'>
                    <thead class="thead-light">
                    <tr>
                        <th>
                            <input type="checkbox" id="chk_all" />
                        </th>
                        <th class="">
                            {{trans('messages.SL#')}}
                        </th>
                        <th class=" ">{{trans('messages.Order')}}</th>
                        <th>{{trans('messages.Date')}}</th>
                        <th>{{trans('messages.customer_name')}}</th>
                        <th>{{trans('messages.Status')}}</th>
                        <th>{{trans('messages.Total')}}</th>
                        <th>{{trans('messages.Order')}} {{trans('messages.Status')}} </th>
                        <th>{{trans('messages.Action')}}</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($orders as $key=>$order)

                        <tr class="status-{{$order['order_status']}} class-all">
                            <td>
                                <!-- <form id="frm_update_status" action="{{route('admin.orders.update_status')}}" method="POST" role="form"> -->
                                    <input type="checkbox" class="chk_id" value="{{$order['id']}}" />
                                <!-- </form> -->
                            </td>
                            <td class="">
                                {{$key+1}}
                            </td>
                            <td class="table-column-pl-0">
                                <a href="{{route('admin.orders.details',['id'=>$order['id']])}}">{{$order['id']}}</a>
                            </td>
                            <td>
                                {{
                                    \App\CPU\BackEndHelper::currency_code()=='VND'?
                                    date('d/m/Y',strtotime($order['created_at'])):
                                    date('d M Y',strtotime($order['created_at']))
                                }}
                            </td>
                            <td>
                                @if($order->customer)
                                    <a class="text-body text-capitalize"
                                       href="{{route('admin.orders.details',['id'=>$order['id']])}}">{{$order->customer['f_name'].' '.$order->customer['l_name']}}</a>
                                @else
                                    <label class="badge badge-danger">Invalid Customer data</label>
                                @endif
                            </td>
                            <td>
                                @if($order->payment_status=='paid')
                                    <span class="badge badge-soft-success">
                                      <span class="legend-indicator bg-success"></span>Paid
                                    </span>
                                @else
                                    <span class="badge badge-soft-danger">
                                      <span class="legend-indicator bg-danger"></span>Unpaid
                                    </span>
                                @endif
                            </td>
                            <td> {{number_format(\App\CPU\BackEndHelper::usd_to_currency($order->order_amount), 2, ",", ".")}}</td>
                            <td class="text-capitalize">
                                @if($order['order_status']=='pending')
                                    <span class="badge badge-soft-info ml-2 ml-sm-3">
                                        <span class="legend-indicator bg-info"></span>{{str_replace('_',' ',$order['order_status'])}}
                                      </span>

                                @elseif($order['order_status']=='processing')
                                    <span class="badge badge-soft-warning ml-2 ml-sm-3">
                                        <span class="legend-indicator bg-warning"></span>{{str_replace('_',' ',$order['order_status'])}}
                                      </span>
                                @elseif($order['order_status']=='failed')
                                    <span class="badge badge-danger ml-2 ml-sm-3">
                                        <span class="legend-indicator bg-warning"></span>{{str_replace('_',' ',$order['order_status'])}}
                                      </span>
                                @elseif($order['order_status']=='delivered')
                                    <span class="badge badge-soft-success ml-2 ml-sm-3">
                                        <span class="legend-indicator bg-success"></span>{{str_replace('_',' ',$order['order_status'])}}
                                      </span>
                                @else
                                    <span class="badge badge-soft-danger ml-2 ml-sm-3">
                                        <span class="legend-indicator bg-danger"></span>{{str_replace('_',' ',$order['order_status'])}}
                                      </span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.orders.details',['id'=>$order['id']])}}">
                                    <i class="tio-visible"></i> {{trans('messages.detail')}}
                                </a>
                                <a target="_blank" href="{{route('admin.orders.view_invoice',[$order['id']])}}">
                                    <i class="tio-download"></i> {{trans('messages.View')}}
                                </a>
                                <!-- <div class="dropdown">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        <i class="tio-settings"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item"
                                           href="{{route('admin.orders.details',['id'=>$order['id']])}}"><i
                                                class="tio-visible"></i> {{trans('messages.detail')}}</a>
                                        <a class="dropdown-item" target="_blank"
                                           href="{{route('admin.orders.view_invoice',[$order['id']])}}"><i
                                                class="tio-download"></i> {{trans('messages.View')}}</a>
                                    </div>
                                </div> -->
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                    <tfoot>
            <tr>
                <th colspan="6" style="text-align:right">Total:</th>
                <th colspan="3"></th>
            </tr>
        </tfoot>
                </table>
            </div>
            <!-- End Table -->

            <!-- Footer -->
            <div class="card-footer">
                <!-- Pagination -->
                <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                    <div class="col-sm-auto">
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <!-- Pagination -->
                            {!! $orders->links() !!}
                        </div>
                    </div>
                </div>
                <!-- End Pagination -->
            </div>
            <!-- End Footer -->
        </div>
        <!-- End Card -->
    </div>
@endsection

@push('script_2')
    <script>
        $(document).on('ready', function () {
            // INITIALIZATION OF NAV SCROLLER
            // =======================================================
            $('.js-nav-scroller').each(function () {
                new HsNavScroller($(this)).init()
            });

            // INITIALIZATION OF SELECT2
            // =======================================================
            $('.js-select2-custom').each(function () {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });


            // INITIALIZATION OF DATATABLES
            // =======================================================
            var buttonCommon = {
                exportOptions: {
                    format: {
                        body: function ( data, row, column, node ) {
                            // Strip $ from salary column to make it numeric
                            return column === 6 ?
                                data.replace( /[đ,]/g, '' ) :
                                data;
                        }
                    }
                }
            };

            // Append a caption to the table before the DataTables initialisation
            $('#example').append('<caption style="caption-side: bottom">A fictional company\'s staff table.</caption>');

            var datatable = $.HSCore.components.HSDatatables.init($('#datatable'), {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'colvis',
                        className: 'd-none'
                    },
                    {
                        text: 'Excel',
                        extend: 'excel',
                        className: 'd-none',
                        exportOptions: {
                            columns: ':visible'
                            // columns: [ 1, 2, 3, 4, 5, 6, 7 ]
                        },
                        // messageTop: 'The information in this table is copyright to Sirius Cybernetics Corp.',
                        title: 'Order list'
                        ,sheetName: 'order_list'
                    },
                    {
                        text: 'PDF',
                        extend: 'pdf',
                        className: 'd-none',
                        exportOptions: {
                            columns: ':visible'
                        }
                        ,title: 'Order list'
                        ,orientation: 'portrait'//or landscape
                        // ,pageSize: 'LEGAL'
                    }
                    ,{
                        text: '{{trans('messages.Print')}}',
                        extend: 'print',
                        className: 'd-none',
                        exportOptions: {
                            columns: ':visible'
                        }
                        ,title: function() {
                            return "<center>Order list</center>";
                        }
                        // ,customize: function(win) {
                        //     $(win.document.body)
                        //         .css( 'font-size', '10pt' )
                        //         .prepend(
                        //             '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0;" />'
                        //         );
        
                        //     $(win.document.body).find('table')
                        //         .addClass('compact')
                        //         .css('text-size', 'inherit');
                        // }
                    }
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child input[type="checkbox"]',
                    classMap: {
                        checkAll: '#datatableCheckAll',
                        counter: '#datatableCounter',
                        counterInfo: '#datatableCounterInfo'
                    }
                },
                language: {
                    zeroRecords: '<div class="text-center p-4">' +
                        '<img class="mb-3" src="{{asset('public/assets/back-end')}}/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">' +
                        '<p class="mb-0">No data to show</p>' +
                        '</div>'
                }
                ,"footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;
                    var currency_symbol = $('#currency_symbol').val();

                    // console.log(currency_code);
                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(currency_symbol,'').replace(/[\.]/g, '').replace(/[,]/g, '.')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };
                    
                    // console.log(intVal("55,57 USD"))

                    // Total over all pages
                    total = api
                        .column(6)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // console.log(total);

                    // Total over this page
                    pageTotal = api
                        .column(6, { page: 'current'} )
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                    
                    
                    var f_pageTotal = new Intl.NumberFormat('de-DE').format(pageTotal);
                    var f_total = new Intl.NumberFormat('de-DE').format(total);
                    // console.log(f_pageTotal);
                    // Update footer
                    var currency_position = $('#currency_position').val();
                    var str_total = currency_symbol + f_pageTotal;
                    if(currency_position=="right") {
                        str_total = f_pageTotal + ' ' + currency_symbol;
                    }

                    $(api.column(6).footer()).html(
                        '<span class="money_total">' + str_total + '</span>' +' ( '+ f_total +' total)'
                    );
                }
                
            });

            // INITIALIZATION OF TAGIFY
            // =======================================================
            $('.js-tagify').each(function () {
                var tagify = $.HSCore.components.HSTagify.init($(this));
            });

            //Call build datatable function
            build_datatable();

            //Handle add buttons like: Excel, PDF, Print
            datatable.buttons().container().appendTo( '#example_wrapper .col-md-6:eq(0)' );

        });

        //Array contain value of checkbox
        var id_arr = [];
        //Array contain values of search
        var search_values = [];
        var count = 0;

        $('#datatableSearch1').on('keyup', function (e) {
            // console.log('call keyup')
            var col_id = parseInt($('#sel_search_field').val());
            var value = $(this).val();
            //Option All
            if(col_id == -1) {
                $('#datatable').DataTable().search(value).draw();
            }
            else {
                //Not press Enter key
                if(e.keyCode != 13) {
                    if(search_values.length == 0)
                        $('#datatable').DataTable().column(col_id).search(value).draw();
                    else {
                        search_values.map((obj, index) => {
                            $('#datatable').DataTable().column(obj.col_id).search(obj.value).draw();
                        })
                    }
                }
                //Having Press Enter key
                else {
                    var col_name = $('#sel_search_field option:selected').text();
                    //Check Empty Value is not insert into a array
                    if(value != '') {
                        search_values.push({
                            "id": count
                            ,"col_id": col_id
                            ,"col_name": col_name
                            ,"value": value
                            ,"html_button": `
                                <span class="btn_del_search" id="btn`+ count +`" onclick="remove_search(`+ count + `,` + col_id +`)">
                                    `+ col_name + ": " + value +`
                                    <i class="tio-remove-circle">
                                    </i>
                                </span>
                            `
                        });
                        //Handle reset value of input
                        $(this).val('');
                        //Handle write html buttons to screen
                        var del_btns = [];
                        search_values.map((obj, index) => del_btns.push(
                            obj.html_button
                        ));
                        $('#search_arr').html(del_btns)
                        //Increase count
                        count++;

                        search_values.map((obj, index) => {
                            $('#datatable').DataTable().column(obj.col_id).search(obj.value).draw();
                        })
                    }
                }
            }     
        });

        //Handle event choose statistic select
        $('#sel_statistic').on('change', function() {
            var val = $(this).val();
            // alert(val)
            if(val == 'option_day') {
                $('.div_option_day').show();
            }
            //Value # option day => call ajax
            else {
                $('.div_option_day').hide();
                $.get({
                    url: '{{route('admin.orders.order_statistic_list')}}'
                    ,data: {
                        val: val,
                    }
                    ,beforeSend: function () {
                        $('#loading').show();
                    },
                    success: function (data) {
                        // toastr.success('Order filter success.');
                        location.reload();
                    },
                    complete: function () {
                        $('#loading').hide();
                    },
                });
            }
        })

        //Handle event press Filter Option Day button
        function filter_by_day() {
            var from_day = $('#from_date').val();
            var to_day = $('#to_date').val();
            console.log("from_day:" + from_day + ",to_day" + to_day)

            if(from_day == "" || to_day == "") {
                Swal.fire({
                    text: '{{trans('messages.require_choose')}} {{trans('messages.from_date')}} and {{trans('messages.to_date')}} or {{trans('messages.format_wrong')}}!',
                    type: 'warning',
                    confirmButtonColor: '#377dff',
                    confirmButtonText: 'Yes',
                    reverseButtons: true
                });
            }
            else {
                $.get({
                    url: '{{route('admin.orders.order_statistic_list')}}'
                    ,data: {
                        val: 'option_day'
                        ,from_day: from_day
                        ,to_day: to_day
                    }
                    ,beforeSend: function() {
                        $('#loading').show();
                    }
                    ,success: function() {
                        location.reload();
                    }
                    ,complete: function() {
                        $('#loading').hide();
                    }
                })
            }
        }


        $('#sel_search_field').on('change', function() {
            $('#datatable').DataTable().columns().every(function() {
                this.search('').draw();
            });
            $('#datatableSearch').val('');
        })

        //Handle event press remove button on search input
        $('#datatableSearch').on('mouseup', function (e) {
            // console.log("call keydown: ", search_values);
            var $input = $(this),
                oldValue = $input.val();

            if (oldValue == "") return;

            setTimeout(function () {
                var newValue = $input.val();

                if (newValue == "") {
                    // Gotcha
                    $('#datatable').DataTable().search('').draw();
                    // var col_id = parseInt($('#sel_search_field').val());
                    // $('#datatable').DataTable().column(col_id).search('').draw();
                }
            }, 1);
        });

        function remove_search(id, col_id) {
            // console.log("call remove search id: " + id);
            search_values = search_values.filter((obj, index) => obj.id!=id)

            var del_btns = [];
            search_values.map((obj, index) => del_btns.push(
                obj.html_button
            ));
            $('#search_arr').html(del_btns)
            //Handle filter again
            $('#datatable').DataTable().column(col_id).search('').draw();
            if(search_values.length == 0) {
                $('#datatable').DataTable().search('').draw();
            }
            else {
                search_values.map((obj, index) => {
                    $('#datatable').DataTable().column(obj.col_id).search(obj.value).draw();
                })
            }
        }

        function build_datatable() {
            //Handle add input into td tag of first tr
            // $('#datatable tbody tr:first td').each( function () {
            //     console.log($(this))
            //     if($(this)[0].cellIndex != 0 && $(this)[0].cellIndex != 8)
            //         $(this).html( '<input type="text" placeholder="Search" size="12" />' );
            // });

            //Handle check all checkbox
            $('.chk_id').change((e) => {
                // console.log(e.target.value, e.target.checked);
                if(e.target.checked) {
                    id_arr.push(e.target.value);
                }
                else {
                    id_arr = id_arr.filter((item) => {
                        return item != e.target.value;
                    });
                }
            });

            $('#chk_all').change((e) => {
                var ids = $('.chk_id');
                
                ids.map((index, item) => {
                    // console.log(item);
                    if(e.target.checked) {
                        $(item).prop('checked', true);
                        // console.log(item);
                        id_arr.push($(item).val());
                    }
                    else {
                        $(item).prop('checked', false);
                        id_arr = [];
                    }
                });
            });

        }

        function update_status() 
        {
            var status = $('#sel_status').val();
            var order_status = $('#sel_order_status').val();
            if(id_arr.length!=0) {
                if(status=="" && order_status=="") {
                    Swal.fire({
                        text: '{{trans('messages.require_choose')}} status or order status !',
                        type: 'warning',
                        confirmButtonColor: '#377dff',
                        confirmButtonText: 'Yes',
                        reverseButtons: true
                    });
                    return;
                }
                Swal.fire({
                    title: 'Are you sure?',
                    type: 'warning',
                    html: "{{trans('messages.confirm_data_update')}}: " + 
                    "<span class='inv_update_info'>" + id_arr.join() + "</span>"
                    + " with"
                    + " <span class='inv_update_info'>status: " + $('#sel_status').val() + "</span>"
                    + ", <span class='inv_update_info'>order status: " + $('#sel_order_status').val() + "</span>"
                    ,showCancelButton: true,
                    cancelButtonColor: 'default',
                    confirmButtonColor: '#377dff',
                    cancelButtonText: 'No',
                    confirmButtonText: 'Yes',
                    reverseButtons: true,
                    customClass: "Custom_Cancel"
                }).then((result) => {
                    // alert($('#sync_all_values').is(":checked"));
                    // return;
                    if (result.value) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            }
                        });
                        $.ajax({
                            method: "POST",
                            url: '{{route('admin.orders.update_status')}}',
                            data: {
                                "status": $('#sel_status').val(),
                                "order_status": $('#sel_order_status').val(),
                                "ids": id_arr
                            },
                            success: function(response) {
                                // console.log(response);
                                location.reload();
                            }
                        });
                    }
                });
            }
            else {
                Swal.fire({
                    text: '{{trans('messages.require_choose')}} {{trans('messages.invoice')}} !',
                    type: 'warning',
                    confirmButtonColor: '#377dff',
                    confirmButtonText: 'Yes',
                    reverseButtons: true
                });
            }
        }

        function filter_order() {
            $.get({
                url: '{{route('admin.orders.inhouse-order-filter')}}',
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    toastr.success('Order filter success.');
                    location.reload();
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        };
    </script>
@endpush
