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
        <a href="#">系统设置</a>
    </li>
    <li class="active">编辑分类</li>
@endsection

@section("header")
    <h1>
        编辑分类
    </h1>
@stop

@section("content")
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header ">
                        <span class="widget-caption">基本信息</span>
                        <div class="widget-buttons">
                            <a href="#" data-toggle="maximize">
                                <i class="fa fa-expand"></i>
                            </a>
                            <a href="#" data-toggle="collapse">
                                <i class="fa fa-minus"></i>
                            </a>
                        </div>
                    </div>
                    <form>
                        <div class="widget-body">
                            <div class="form_text form-group">
                                <label for="name" class="col-sm-2 control-label text-align-right">名称：</label>
                                <input type="text" maxlength="10" class="form-control col-sm-7" value="{{ $type_info->name or null}}" name="name" id="name">
                            </div>
                            <div class="form_text form-group">
                                <label for="name" class="col-sm-2 control-label text-align-right">分类：</label>
                                <select class="form-control col-sm-7" id="type" data-content="{{ $type_info->type or 0}}">
                                    <option value="0">技术博客</option>
                                    <option value="1">情感随笔</option>
                                </select>
                            </div>
                            <div class="form_text form-group">
                                <label for="name" class="col-sm-2 control-label text-align-right">状态：</label>
                                <select class="form-control col-sm-7" id="status" data-content="{{ $type_info->status or 0}}">
                                    <option value="0">正常</option>
                                    <option value="1">禁用</option>
                                </select>
                            </div>
                            <input type="button" class="add_apply btn btn-azure shiny" value="提交">
                            {!! csrf_field() !!}
                            <input type="hidden" data-content="{{ $type_info->id or 0}}" id="type_id">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("script")
    <script>
        $(function () {
            $("#type").find("option[value='"+$("#type").data('content')+"']").attr("selected",true);
            $("#status").find("option[value='"+$("#status").data('content')+"']").attr("selected",true);
            var _token = $("input[name='_token']") .val();
            $(".add_apply").click(function () {
                var name = $.trim($("#name").val());
                var type = $.trim($("#type").val());
                var status = $.trim($("#status").val());
                var type_id = $.trim($("#type_id").data('content'));
                $.post(
                    '/Admin/set?_token='+_token,
                    {
                        name:name,
                        type:type,
                        status:status,
                        id:type_id,
                    },
                    function (data) {
                        data = JSON.parse(data);
                        if(data.msg_code==0) {
                            alert_info(0, "成功", data.msg);
                            setTimeout(function () {
                                location.href='/Admin/type_list';
                            },1000)
                        }else{
                            alert_info(1,"失败",data.msg);
                        }
                    }
                )
            })
        })
    </script>
@stop