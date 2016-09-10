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
                                    <div id="alerts"></div>
                                    <div class="btn-toolbar wysiwyg-toolbar" data-role="editor-toolbar" data-target="#editor">
                                        <div class="btn-group">
                                            <a data-original-title="Font" class="btn btn-default dropdown-toggle" data-toggle="dropdown" title=""><i class="fa fa-font"></i><b class="caret"></b></a>
                                            <ul class="dropdown-menu"><li><a data-edit="fontName Serif" style="font-family:'Serif'">Serif</a></li><li><a data-edit="fontName Sans" style="font-family:'Sans'">Sans</a></li><li><a data-edit="fontName Arial" style="font-family:'Arial'">Arial</a></li><li><a data-edit="fontName Arial Black" style="font-family:'Arial Black'">Arial Black</a></li><li><a data-edit="fontName Courier" style="font-family:'Courier'">Courier</a></li><li><a data-edit="fontName Courier New" style="font-family:'Courier New'">Courier New</a></li><li><a data-edit="fontName Comic Sans MS" style="font-family:'Comic Sans MS'">Comic Sans MS</a></li><li><a data-edit="fontName Helvetica" style="font-family:'Helvetica'">Helvetica</a></li><li><a data-edit="fontName Impact" style="font-family:'Impact'">Impact</a></li><li><a data-edit="fontName Lucida Grande" style="font-family:'Lucida Grande'">Lucida Grande</a></li><li><a data-edit="fontName Lucida Sans" style="font-family:'Lucida Sans'">Lucida Sans</a></li><li><a data-edit="fontName Tahoma" style="font-family:'Tahoma'">Tahoma</a></li><li><a data-edit="fontName Times" style="font-family:'Times'">Times</a></li><li><a data-edit="fontName Times New Roman" style="font-family:'Times New Roman'">Times New Roman</a></li><li><a data-edit="fontName Verdana" style="font-family:'Verdana'">Verdana</a></li></ul>
                                        </div>
                                        <div class="btn-group">
                                            <a data-original-title="Font Size" class="btn btn-default dropdown-toggle" data-toggle="dropdown" title=""><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                                            <ul class="dropdown-menu dropdown-default">
                                                <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
                                                <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
                                                <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
                                            </ul>
                                        </div>
                                        <div class="btn-group">
                                            <a data-original-title="Bold (Ctrl/Cmd+B)" class="btn btn-default" data-edit="bold" title=""><i class="fa fa-bold"></i></a>
                                            <a data-original-title="Italic (Ctrl/Cmd+I)" class="btn btn-default" data-edit="italic" title=""><i class="fa fa-italic"></i></a>
                                            <a data-original-title="Strikethrough" class="btn btn-default" data-edit="strikethrough" title=""><i class="fa fa-strikethrough"></i></a>
                                            <a data-original-title="Underline (Ctrl/Cmd+U)" class="btn btn-default" data-edit="underline" title=""><i class="fa fa-underline"></i></a>
                                        </div>
                                        <div class="btn-group">
                                            <a data-original-title="Bullet list" class="btn btn-default" data-edit="insertunorderedlist" title=""><i class="fa fa-list-ul"></i></a>
                                            <a data-original-title="Number list" class="btn btn-default" data-edit="insertorderedlist" title=""><i class="fa fa-list-ol"></i></a>
                                            <a data-original-title="Reduce indent (Shift+Tab)" class="btn btn-default" data-edit="outdent" title=""><i class="fa fa-outdent"></i></a>
                                            <a data-original-title="Indent (Tab)" class="btn btn-default" data-edit="indent" title=""><i class="fa fa-indent"></i></a>
                                        </div>
                                        <div class="btn-group">
                                            <a data-original-title="Align Left (Ctrl/Cmd+L)" class="btn btn-default btn-active" data-edit="justifyleft" title=""><i class="fa fa-align-left"></i></a>
                                            <a data-original-title="Center (Ctrl/Cmd+E)" class="btn btn-default" data-edit="justifycenter" title=""><i class="fa fa-align-center"></i></a>
                                            <a data-original-title="Align Right (Ctrl/Cmd+R)" class="btn btn-default" data-edit="justifyright" title=""><i class="fa fa-align-right"></i></a>
                                            <a data-original-title="Justify (Ctrl/Cmd+J)" class="btn btn-default" data-edit="justifyfull" title=""><i class="fa fa-align-justify"></i></a>
                                        </div>
                                        <div class="btn-group">
                                            <a data-original-title="Hyperlink" class="btn btn-default dropdown-toggle" data-toggle="dropdown" title=""><i class="fa fa-link"></i></a>
                                            <div class="dropdown-menu dropdown-arrow">
                                                <div class="input-group">
                                                    <input class="form-control" placeholder="URL" data-edit="createLink" type="text">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="button">Add</button>
                                                </span>
                                                </div>
                                            </div>
                                            <a data-original-title="Remove Hyperlink" class="btn btn-default" data-edit="unlink" title=""><i class="fa fa-cut"></i></a>
                                        </div>

                                        <div class="btn-group">
                                            <a data-original-title="Insert picture (or just drag &amp; drop)" class="btn btn-default" title="" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                                            <input style="opacity: 0; position: absolute; top: 0px; left: 0px; width: 45px; height: 33px;" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" type="file">
                                        </div>
                                        <div class="btn-group">
                                            <a data-original-title="Undo (Ctrl/Cmd+Z)" class="btn btn-default" data-edit="undo" title=""><i class="fa fa-undo"></i></a>
                                            <a data-original-title="Redo (Ctrl/Cmd+Y)" class="btn btn-default" data-edit="redo" title=""><i class="fa fa-repeat"></i></a>
                                        </div>
                                        <input style="display: none;" data-edit="inserttext" class="wysiwyg-voiceBtn" id="voiceBtn" x-webkit-speech="" type="text">
                                    </div>
                                    <div class="wysiwyg-editor" id="editor" contenteditable="true">
                                        {{--{$journalism_info['content']|html_entity_decode}--}}
                                    </div>
                                </div>
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