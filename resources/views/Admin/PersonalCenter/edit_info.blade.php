@extends("Admin.master.base")
@section("style")
    <link rel="stylesheet" href="{{asset('Admin')}}/css/edit_info.css" />
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
                                <label for="name" class="col-sm-1 control-label no-padding-right">姓名：</label>
                                <input type="text" maxlength="4" class="form-control" value="{{$user_info->name}}" name="name" id="name">
                            </div>
                            <div class="form_text form-group">
                                <label for="signature" class="col-sm-1 control-label no-padding-right">个性签名：</label>
                                <input type="text" maxlength="50" class="form-control" value="{{$user_info->signature}}" name="signature" id="signature">
                            </div>
                            <div class="form_text_supervisor form-group">
                                <label for="diplomas" class="col-sm-2 control-label no-padding-right">学历：</label>
                                <select name="diplomas" id="diplomas" diplomas={{$user_info->diplomas}}>
                                    <option>小学及以下</option>
                                    <option>初中</option>
                                    <option>高中</option>
                                    <option>中专</option>
                                    <option>大专</option>
                                    <option>本科</option>
                                    <option>研究生</option>
                                    <option>博士及以上</option>
                                    <option>12</option>
                                </select>
                            </div>
                            <div class="form_text_cell form-group">
                                <label for="school" class="col-sm-2 control-label no-padding-right">学校：</label>
                                <input type="text" maxlength="20" name="school" id="school" class="form-control form-control-or" value="{{$user_info->school}}">
                            </div>
                            <div class="form_text_supervisor form-group">
                                <label for="phone" class="col-sm-2 control-label no-padding-right">电话：</label>
                                <input type="tel" class="form-control form-control-or" value="{{$user_info->phone}}" name="phone" id="phone">
                            </div>
                            <div class="form_text_cell form-group">
                                <label for="email" class="col-sm-2 control-label no-padding-right">邮箱：</label>
                                <input type="email" class="form-control form-control-or" value="{{$user_info->email}}" name="email" id="email">
                            </div>
                            <div class="form_text_supervisor form-group">
                                <label for="birthday" class="col-sm-2 control-label">生日：</label>
                                <div class="input-group">
                                    <input class="form-control date-picker" name="birthday" value="{{date("Y-m-d",$user_info->birthday)}}" id="birthday" type="text" data-date-format="yyyy-mm-dd">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form_text_cell form-group">
                                <label for="sex" id="sex" sex={{$user_info->sex}} class="col-sm-2 control-label no-padding-right">性别：</label>
                                <div class="radio">
                                    <label>
                                        <input name="sex" value="0" class="colored-blue" type="radio">
                                        <span class="text"> 男</span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input name="sex" value="1" class="colored-blue" type="radio">
                                        <span class="text"> 女</span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input name="sex" value="2" class="colored-blue" type="radio">
                                        <span class="text"> 保密</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form_text form-group">
                                <label for="birthplace" class="col-sm-1 control-label">出生地：</label>
                                <input type="text" maxlength="50" class="form-control" value="{{$user_info->birthplace}}" name="birthplace" id="birthplace">
                            </div>
                            <div class="form_text form-group">
                                <label for="location" class="col-sm-1 control-label">所在地：</label>
                                <input type="text" maxlength="50" class="form-control" value="{{$user_info->location}}" name="location" id="location">
                            </div>
                            <div class="form_textarea form-group">
                                <label for="explain" class="col-sm-1 control-label no-padding-right">个人说明：</label>
                                <textarea class="form-control" name="explain" maxlength="225" rows="6" id="explain" placeholder="Default Text">{{$user_info->explain}}</textarea>
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