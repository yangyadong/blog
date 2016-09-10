@extends("Admin.master.base")
@section("style")
    <link rel="stylesheet" href="" />
@endsection

@section("breadcrumb")
    <li>
        <i class="menu-icon fa fa-desktop"></i>
        <a href="#">个人首页</a>
    </li>
    {{--<li class="active">社团认证</li>--}}
@endsection

@section("header")
    <h1>
        个人首页
    </h1>
@stop

@section("content")
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header ">
                        <span class="widget-caption">个人首页</span>
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
                        <div class="row fileupload-buttonbar" >

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script type="text/javascript" src=""></script>
@stop