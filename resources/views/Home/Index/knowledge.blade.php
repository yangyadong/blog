@extends('Home.master.base')

@section('title')
    <title>学无止境</title>
@endsection

@section('style')
    <link href="/Home/css/learn.css" rel="stylesheet">
    <link href="http://bdimg.share.baidu.com/static/css/bdsstyle.css?cdnversion=20131219" rel="stylesheet" type="text/css">
@endsection

@section('content_head')
    <h1 class="t_nav">
        <span>我们长路漫漫，只因学无止境。</span>
        <a href="/Home/index" class="n1">网站首页</a>
        <a href="/Home/knowledge" class="n2">学无止境</a>
    </h1>
@endsection
@section('left_content')
    <div class="newblog left">
        @foreach($knowledge as $vo)
            <div style="display: inline-block;">
                <h2>{{ $vo->title }}</h2>
                <p class="dateview"><span>发布时间：{{ date("Y-m-d H:i:s",$vo->update_time) }}</span>
                    <span>作者：{{ $vo->name }}</span>
                    <span>分类：[<a href="/Home/knowledge?type_id={{ $vo->type_id }}">{{ $vo->type }}</a>]</span>
                </p>
                <figure><img src="{{ $vo->image }}"></figure>
                <ul class="nlist" style="max-height: 180px;">
                    <p>{!! $vo->content !!}</p>
                </ul>
                <a href="/Home/title_info?t_id={{ $vo->id }}" target="_blank" class="readmore">详细信息&gt;&gt;</a>
            </div>
            <div class="line"></div>
        @endforeach
        <a title="加载更多" href="javascript:void(0);" class="readmore more">加载更多</a>
        <input type="hidden" id="page" value="2" />
    </div>
@endsection
@section('right_content')
    <aside class="right">
        <div class="rnav">
            <h2>栏目导航</h2>
            <ul>
                <li><a class="type_nav" data-content="0" href="/Home/knowledge">全部</a></li>
                @foreach($article_type as $vo)
                    <li><a class="type_nav" data-content="{{ $vo->id }}" href="/Home/knowledge?type_id={{ $vo->id }}">{{ $vo->name }}</a></li>
                @endforeach
                <input type="hidden" id="type_id" value="{{ $type_id }}" />
            </ul>
        </div>
        <div class="news">
            <h3>
                <p>最新<span>文章</span></p>
            </h3>
            <ul class="rank">
                @foreach($new_title as $vo)
                    <li><a href="/Home/title_info?t_id={{ $vo->id }}" title="{{ $vo->name }}" target="_blank">{{ $vo->name }}</a></li>
                @endforeach
            </ul>
            <h3 class="ph">
                <p>点击<span>排行</span></p>
            </h3>
            <ul class="paih">
                @foreach($like_title as $vo)
                    <li><a href="/Home/title_info?t_id={{ $vo->id }}" title="{{ $vo->name }}" target="_blank">{{ $vo->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </aside>
@endsection
@section('script')
    <script>
        $(function () {
            var type_id = $("#type_id").val();
            for (var i=0;i<$(".type_nav").length;i++){
                if($(".type_nav").eq(i).data('content')==type_id){
                    $(".type_nav").eq(i).css('background-color','rgb(242, 242, 146)');
                    break;
                }
            }
            $(window).scroll(function() {
                //当内容滚动到底部时加载新的内容
                if ($(this).scrollTop() + $(window).height() >= $(document).height()) {
                    $(".more").click();
                }
            });
            $(".more").click(function () {
                var page = $("#page").val();
                $("#page").text('加载中...');
                $.get(
                        '/Home/knowledge_more',
                        {
                            type_id:type_id,
                            page:page,
                        },
                        function (data) {
                            if(data!=''){
                                var html;
                                for(var i = 0;i < data.length; i++){
                                    html = '<div style="display: block;" "><h2>'+data[i]["title"]+'</h2>'
                                            +'<p class="dateview"><span>发布时间：'+format(parseInt(data[i]["update_time"]) * 1000)
                                            +'</span><span>作者：'+data[i]["name"]
                                            +'</span><span>分类：[<a href="/Home/knowledge?type_id='+data[i]["type_id"]
                                            +'">'+data[i]["type"]+'</a>]</span></p>'
                                            +'<figure><img src="'+data[i]["image"]+'"></figure>'
                                            +'<ul class="nlist"><p>'+data[i]["content"]
                                            +'</p></ul>'
                                            +'<a href="/Home/title_info?t_id='+data[i]["id"]+'" target="_blank" class="readmore">详细信息&gt;&gt;</a></div>'
                                            +'<div class="line"></div>';
                                    $(".more").before(html);
                                }
                                $("#page").val(parseInt(page)+1);
                            }
                            $(".more").attr('disabled',false);
                            $("#page").text('加载更多');
                        }
                )
                $(".more").attr('disabled',true);
            })
        })
    </script>
@endsection