@extends("Admin.master.base")
@section("style")
    <link href="{{asset("static")}}/FileUpload/css/jquery.fileupload.css" rel="stylesheet">
    <link href="{{asset("static")}}/FileUpload/css/jquery.fileupload-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("Admin")}}/css/write.css" />
    <style>
        .form-text{
            line-height: 34px;
        }
        .title_label{
            width: 120px;
        }
    </style>
@endsection

@section("breadcrumb")
    <li>
        <i class="menu-icon fa fa-desktop"></i>
        <a href="#">个人中心</a>
    </li>
    <li class="active">文章详情</li>
@endsection

@section("header")
    <h1>
        文章详情
    </h1>
@stop

@section("content")
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header">
                        <span class="widget-caption">文章详情</span>
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
                            <label for="title" class="title_label col-sm-2 control-label no-padding-right">标题：</label>
                            <span class="form-text">{{ $article->title }}</span>
                        </div>
                        <div class="form_text form-group">
                            <label for="acticle_type" class="title_label col-sm-2 control-label no-padding-right">文章类型：</label>
                            <span class="form-text">{{ $article->name }}</span>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <div class="widget flat radius-bordered">
                                <div class="widget-header bordered-bottom bordered-themesecondary">
                                    <span class="widget-caption">文章内容</span>
                                    <div class="widget-buttons">
                                        <a href="#" data-toggle="maximize">
                                        </a>
                                    </div>
                                </div>

                                <div class="widget-body">
                                    <div class="wysiwyg-editor" id="editor" style="overflow: auto;">
                                        {!! $article->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row fileupload-buttonbar" style="padding-left:15px;">
                            <div class="upload_img thumbnail col-sm-10">
                                <img id="photo_show" style="height:180px;margin-top:10px;margin-bottom:8px;"  src="{{ $article->image }}" data-holder-rendered="true">
                            </div>
                        </div>
                        <a href="/Admin/save_write?save={{ $article->id }}" class="add_apply btn btn-azure shiny">重新编辑</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")

@stop