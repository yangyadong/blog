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
        <a href="#">系统设置</a>
    </li>
    <li class="active">分类列表</li>
@endsection

@section("header")
    <h1>
        分类列表
    </h1>
@stop

@section("content")

    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header ">
                        <span class="widget-caption">分类列表</span>
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

                        <div class="table-toolbar" style="position:absolute;padding: 0px;right: 60%;z-index: 999">
                            <div class="btn-group">
                                <a type="button" class="btn btn-default" href="{{url("Admin/setting")}}">
                                    <i class=""></i>写文章
                                </a>
                            </div>
                        </div>

                        <table class="table table-striped table-hover table-bordered" id="articles_type">
                            <thead>
                            <tr role="row">
                                <th>
                                    编号
                                </th>
                                <th>
                                    名字
                                </th>
                                <th>
                                    分类
                                </th>
                                <th>
                                    状态
                                </th>
                                <th>
                                    编辑
                                </th>
                            </tr>
                            </thead>
                            <tbody class="data">
                            @foreach($article_type as $key=>$vo)
                                <tr>
                                    <td>{!! $vo->id !!}</td>
                                    <td>{{$vo->name}}</td>
                                    <td>
                                        @if($vo->type==0)
                                            技术博客
                                        @elseif($vo->type==1)
                                            情感随笔
                                        @endif
                                    </td>
                                    <td>
                                        @if($vo->status==0)
                                            正常
                                        @elseif($vo->status==1)
                                            已禁用
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/Admin/setting?id={{ $vo->id }}">重新编辑</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $("#articles_type").DataTable({
                "sDom": "Tflt<'row DTTTFooter'<'col-sm-6'i><'col-sm-6'p>>",
                "language": {
                    "search": "",
                    "sLengthMenu": "_MENU_",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                }
            });
        })
    </script>
@endsection