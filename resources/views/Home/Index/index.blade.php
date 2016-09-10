@extends('Home.master.base')

@section('title')
    <title>首页</title>
@endsection

@section('style')
    <link href="/Home/css/index.css" rel="stylesheet">
@endsection

@section('banner')
    <div class="banner">
        <section class="box">
            <ul class="texts">
                <p>打了死结的青春，捆死一颗苍白绝望的灵魂。</p>
                <p>为自己掘一个坟墓来葬心，红尘一梦，不再追寻。</p>
                <p>加了锁的青春，不会再因谁而推开心门。</p>
            </ul>
            <div class="avatar"><a href="/Home/about"><span>亚东</span></a></div>
        </section>
    </div>
@endsection

@section('left_content')
    <h2 class="title_tj">
        <p>文章<span>推荐</span></p>
    </h2>
    <div class="bloglist left">
        @foreach($title as $vo)
            <div style="display: block;">
                <h3>{{ $vo->title }}</h3>
                <figure><img src="{{ $vo->image }}"></figure>
                <ul class="nlist">
                    <p>
                        {!! $vo->content !!}
                    </p>
                </ul>
                @if($vo->type==0)
                    <a href="/Home/title_info?t_id={{ $vo->article_id }}" target="_blank" class="readmore">阅读全文>></a>
                @elseif($vo->type==1)
                    <a href="/Home/moodlist_info?t_id={{ $vo->article_id }}" target="_blank" class="readmore">阅读全文>></a>
                @endif
                <p class="dateview"><span>{{ date('Y-m-d H:i:s',$vo->update_time) }}</span>
                    <span>作者：{{ $vo->name }}</span>
                    <span>个人博客：[
                        @if($vo->type==0)
                            <a href="/Home/knowledge?type_id={{ $vo->type_id }}">{{ $vo->article_type }}</a>
                        @elseif($vo->type==1)
                            <a href="/Home/moodlist">{{ $vo->article_type }}</a>
                        @endif
                        ]
                </span>
                </p>
            </div>
        @endforeach
        <a title="加载更多" href="javascript:void(0);" class="readmore more">加载更多</a>
        <input type="hidden" id="page" value="2" />
    </div>
@endsection
@section('right_content')
    <aside class="right">
        {{--<div class="weather"><iframe width="250" scrolling="no" height="60" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=12&icon=1&num=1"></iframe></div>--}}
        <div class="news">
            <h3>
                <p>最新<span>文章</span></p>
            </h3>
            <ul class="rank">
                @foreach($new_title as $vo)
                    <li>
                        @if($vo->type==0)
                            <a href="/Home/title_info?t_id={{ $vo->id }}" title="{{ $vo->name }}" target="_blank">{{ $vo->name }}</a>
                        @elseif($vo->type==1)
                            <a href="/Home/moodlist_info?t_id={{ $vo->id }}" title="{{ $vo->name }}" target="_blank">{{ $vo->name }}</a>
                        @endif
                    </li>
                @endforeach
            </ul>
            <h3 class="ph">
                <p>点击<span>排行</span></p>
            </h3>
            <ul class="paih">
                @foreach($like_title as $vo)
                    <li>
                        @if($vo->type==0)
                            <a href="/Home/title_info?t_id={{ $vo->id }}" title="{{ $vo->name }}" target="_blank">{{ $vo->name }}</a>
                        @elseif($vo->type==1)
                            <a href="/Home/moodlist_info?t_id={{ $vo->id }}" title="{{ $vo->name }}" target="_blank">{{ $vo->name }}</a>
                        @endif
                    </li>
                @endforeach
            </ul>
            <h3 class="links">
                <p>友情<span>链接</span></p>
            </h3>
            <ul class="website">
                <li><a href="/">个人博客</a></li>
            </ul>
        </div>
        <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare">
            <a class="bds_tsina"></a>
            <a class="bds_qzone"></a>
            <a class="bds_tqq"></a>
            <a class="bds_renren"></a>
            <span class="bds_more"></span>
            <a class="shareCount"></a>
        </div>
        <a href="/" class="weixin"> </a>
    </aside>
@endsection
@section('script')
    <script>
        $(function () {
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
                        '/Home/title_more',
                        {
                            page:page
                        },
                        function (data) {
                            if(data!=''){
                                var html;
                                for(var i = 0;i < data.length; i++){
                                    var type_a;
                                    var info_a;
                                    if(data[i]["type"]==0){
                                        type_a='<a href="/Home/knowledge?type_id='+data[i]["type_id"]+'">'+data[i]["article_type"]+'</a>';
                                        info_a = '/Home/title_info?t_id='+data[i]["article_id"];
                                    }else{
                                        type_a='<a href="/Home/moodlist">'+data[i]["article_type"]+'</a>';
                                        info_a = '/Home/moodlist_info?t_id='+data[i]["article_id"];
                                    }
                                    html = '<div style="display: block;"><h3>'+data[i]["title"]+'</h3>'
                                            +'<figure><img src="'+data[i]["image"]+'"></figure>'
                                            +'<ul class="nlist"><p>'+data[i]["content"]
                                            +'</p></ul><a href="'+info_a+'" target="_blank" class="readmore">阅读全文>></a>'
                                            +'<p class="dateview"><span>'+format(parseInt(data[i]["update_time"]) * 1000)
                                            +'</span><span>作者：'+data[i]["name"]
                                            +'</span><span>个人博客：['
                                            +type_a
                                            +']</span></p></div>';
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