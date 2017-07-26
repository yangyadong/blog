@extends("Admin.master.base")
@section("style")
    <link href="{{asset("static")}}/FileUpload/css/jquery.fileupload.css" rel="stylesheet">
    <link href="{{asset("static")}}/FileUpload/css/jquery.fileupload-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("Admin")}}/css/write.css" />
@endsection

@section("breadcrumb")
    <li>
        <i class="menu-icon fa fa-desktop"></i>
        <a href="#">个人中心</a>
    </li>
    <li class="active">写文章</li>
@endsection

@section("header")
    <h1>
        写文章
    </h1>
@stop

@section("content")
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header">
                        <span class="widget-caption">写文章</span>
                        <div class="widget-buttons">
                            <a href="#" data-toggle="maximize">
                                <i class="fa fa-expand"></i>
                            </a>
                            <a href="#" data-toggle="collapse">
                                <i class="fa fa-minus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="widget-body">
                        <div class="form_text form-group">
                            <label for="title" class="title_label col-sm-1 control-label no-padding-right">标题：</label>
                            <input type="text" maxlength="25" class="form-control" name="title" id="title">
                        </div>
                        <div class="form_text form-group">
                            <label for="acticle_type" class="title_label col-sm-1 control-label no-padding-right">文章类型：</label>
                            <select id="acticle_type">
                                @foreach($article_type as $vo)
                                    <option value={{$vo->id}}>{{$vo->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form_text form-group">
                            <label for="acticle_type" class="title_label col-sm-1 control-label no-padding-right">文章类型：</label>
                            <div class="form-control" style="width:88%;height: inherit;">
                                <script name="explain" id="editor" type="text/plain"
                                        style="width:100%;height:500px;"></script>
                            </div>
                        </div>

                        <div class="row fileupload-buttonbar" style="padding-left:15px;">
                            <div class="upload_img thumbnail col-sm-10">
                                <img id="photo_show" style="height:180px;margin-top:10px;margin-bottom:8px;"  src="{{$default}}" data-default="{{ $default }}" data-holder-rendered="true">
                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="10" aria-valuemax="100" aria-valuenow="0"><div id="photo_progress" class="progress-bar progress-bar-success" style="width:0%;"></div></div>
                                <div class="caption" align="center">
                                    <span id="photo_upload" class="btn btn-primary fileinput-button">
                                    <span>上传封面</span>
                                    <input type="file" id="photo_image" name="photo_image" multiple>
                                    </span>
                                    <a id="photo_cancle" href="javascript:void(0)" class="btn btn-warning" role="button" style="display:none">删除</a>
                                </div>
                            </div>
                        </div>

                        <a href="javascript:void(0);" class="add_apply btn btn-azure shiny">发表文章</a>
                        {!! csrf_field() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script type="text/javascript" charset="utf-8" src="{{asset('ue')}}/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset('ue')}}/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="{{asset('ue')}}/lang/zh-cn/zh-cn.js"></script>
    {{--编辑器--}}
    <script src="{{asset('/assets')}}/js/editors/wysiwyg/jquery.hotkeys.js"></script>
    <script src="{{asset('/assets')}}/js/editors/wysiwyg/prettify.js"></script>
    <script src="{{asset('/assets')}}/js/editors/wysiwyg/bootstrap-wysiwyg.js"></script>
    {{--上传插件--}}
    <script src="{{asset('/static')}}/FileUpload/js/vendor/jquery.ui.widget.js"></script>
    <script src="{{asset('/static')}}/FileUpload/js/jquery.iframe-transport.js"></script>
    <script src="{{asset('/static')}}/FileUpload/js/jquery.fileupload.js"></script>

    <script type="text/javascript" src="{{asset('/Admin')}}/js/write.js"></script>
@stop