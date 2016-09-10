@extends("Admin.master.base")
@section("style")
    <style>
        table td,table th{
            text-align: center;
            line-height: 40px!important;
        }
        .data>tr>td:first-child>a{
            display: inline-block;
            width: 120px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .data img{
             height: 40px;
         }
        input[type=checkbox]{
            display: none;
        }
        .text{
            cursor: pointer;
        }
        .data>tr>td:last-child>label{
             margin: 0px;
            height: 24px!important;
        }
        .panel-body label{
            margin-left: 30px;
        }
    </style>
@endsection

@section("breadcrumb")
    <li>
        <i class="menu-icon fa fa-desktop"></i>
        <a href="#">个人中心</a>
    </li>
    <li class="active">我的文章</li>
@endsection

@section("header")
    <h1>
        我的文章
    </h1>
@stop

@section("content")

    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header ">
                        <span class="widget-caption">我的文章</span>
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

                        <div class="table-toolbar">
                            <div class="panel-group accordion" id="accordion" style="margin-bottom: 8px;">
                                <div class="panel panel-default">
                                    <div class="panel-heading ">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                                               data-parent="#accordion"
                                               href="#collapseOne">
                                                <i class="fa fa-search"></i> 高级搜索
                                            </a>
                                        </h4>
                                    </div>

                                    <div id="collapseOne" class="panel-collapse collapse">
                                        <div class="panel-body">

                                            <label>文章类型</label>
                                            <select  id="grasp_type">
                                                <option value="0">全部</option>
                                                @foreach($article_type as $vo)
                                                    <option value={{$vo->id}}>{{$vo->name}}</option>
                                                @endforeach
                                            </select>
                                            <label>文章状态</label>
                                            <select  id="grasp_status">
                                                <option value="2">全部</option>
                                                <option value="0">开放的</option>
                                                <option value="1">私阅的</option>
                                            </select>
                                            <button id="seek" type="button" class="btn btn-primary" style="padding: 7px; margin-top: -3px;">
                                                <i class="fa fa-search"></i>搜索
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-toolbar" style="position:absolute;padding: 0px;right: 60%;z-index: 999">
                            <div class="btn-group">
                                <a type="button" class="btn btn-default" href="{{url("Admin/write")}}">
                                    <i class=""></i>写文章
                                </a>
                            </div>
                        </div>

                        <table class="table table-striped table-hover table-bordered" id="my_articles">
                            <thead>
                            <tr role="row">
                                <th>
                                    标题
                                </th>
                                <th>
                                    作者
                                </th>
                                <th>
                                    图标
                                </th>
                                <th>
                                    发布时间
                                </th>
                                {{--<th>--}}
                                    {{--重新编辑--}}
                                {{--</th>--}}
                                <th>
                                    状态(开放)
                                </th>
                            </tr>
                            </thead>
                            <tbody class="data">
                            @foreach($article as $key=>$vo)
                                <tr>
                                    <td>{!! $vo->title !!}</td>
                                    <td>{{$vo->name}}</td>
                                    <td>{!! $vo->image !!}</td>
                                    <td>{{$vo->update_time}}</td>
                                    <td>{!! $vo->operation !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! csrf_field() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script type="text/javascript" src="{{asset('Admin')}}/js/my_articles.js"></script>
@stop