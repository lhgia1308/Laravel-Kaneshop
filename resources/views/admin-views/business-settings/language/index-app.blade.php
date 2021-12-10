@extends('layouts.back-end.app')

@section('title','Language')

@push('css_or_js')
    <link href="{{ asset('public/assets/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/assets/back-end/css/custom.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('messages.Dashboard')}}</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">{{trans('messages.language_setting')}} for App</li>
            </ol>
        </nav>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="alert alert-warning sticky-top" id="alert_box" style="display:none;">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>Warning!</strong> Follow the documentation to setup from app end, 
                    <!-- <a href="https://documentation.6amtech.com/sixvalley-ecommerce/docs/1.0/app-setup#section3" target="_blank">click
                        here
                    </a>. -->
                    <a>Click here</a>.
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Select Languages for {{trans('messages.product')}} {{trans('messages.and')}} {{trans('messages.category')}}</h4>
                        <label class="badge badge-danger">* For mobile app only</label>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.business-settings.web-config.update-language')}}" method="post">
                            @csrf
                            @php
                                $language=\App\Model\BusinessSetting::where('type','pnc_language')->first();
                                $language = json_decode($language->value,true) ?? [];
                                $lang_arr = \App\Model\Language::orderBy('id','asc')->get();
                            @endphp
                            <div class="form-group">
                                <select name="language[]" id="language" onchange="$('#alert_box').show();"
                                        data-maximum-selection-length="3" class="form-control js-select2-custom"
                                        required multiple=true>
                                    @foreach($lang_arr as $key=>$data)
                                        <option value="{{$data['code']}}" {{in_array($data['code'],$language)?'selected':''}}>
                                            {{$data['name']}} - {{$data['code']}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit"
                                    class="btn btn-primary float-right ml-3">{{trans('messages.Save')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush
