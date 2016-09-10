@extends("Admin.master.base")
@section("style")
    <link rel="stylesheet" href="{{asset('Admin')}}/css/edit_info.css" />
    <style>
        .form-control{
            width: 70%;
        }
    </style>
@endsection

@section("breadcrumb")
    <li>
        <i class="menu-icon fa fa-desktop"></i>
        <a href="#">个人中心</a>
    </li>
    <li class="active">编辑资料</li>
@endsection

@section("header")
    <h1>
        编辑资料
    </h1>
@stop

@section("content")
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header ">
                        <span class="widget-caption">编辑资料</span>
                        <div class="widget-buttons">
                            <a href="#" data-toggle="maximize">
                                <i class="fa fa-expand"></i>
                            </a>
                            <a href="#" data-toggle="collapse">
                                <i class="fa fa-minus"></i>
                            </a>
                        </div>
                    </div>
                    <form action="save_info" method="post" autocomplete="on">
                        <div class="widget-body">
                            <div class="form_text form-group">
                                <label for="name" class="col-sm-2 control-label text-align-right">老密码：</label>
                                <input type="text" maxlength="4" class="form-control col-sm-7" name="name" id="name">
                            </div>
                            <div class="form_text form-group">
                                <label for="signature" class="col-sm-2 control-label text-align-right">新密码：</label>
                                <input type="text" maxlength="50" class="form-control col-sm-7" name="signature" id="signature">
                            </div>
                            <div class="form_text form-group">
                                <label for="birthplace" class="col-sm-2 control-label text-align-right">确认密码：</label>
                                <input type="text" maxlength="50" class="form-control col-sm-7" name="birthplace" id="birthplace">
                            </div>
                            <input type="submit" class="add_apply btn btn-azure shiny" value="提交修改">
                            {!! csrf_field() !!}
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script src="{{asset('assets')}}/js/datetime/bootstrap-timepicker.js"></script>
    <script src="{{asset('assets')}}/js/datetime/bootstrap-datepicker.js"></script>
    <!--Bootstrap Date Range Picker-->
    <script src="{{asset('assets')}}/js/datetime/moment.js"></script>
    <script src="{{asset('assets')}}/js/datetime/daterangepicker.js"></script>

    <script type="text/javascript" src="{{asset('Admin')}}/js/edit_info.js"></script>
@stop