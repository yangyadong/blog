@extends('Home.master.base')

@section('title')
    <title>学无止境</title>
@endsection

@section('style')
    <link href="/Home/css/learn.css" rel="stylesheet">
    <link href="{{asset('/assets')}}/css/bootstrap.min.css" rel="stylesheet"/>
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
        <div style="display: inline-block;width: 100%;min-height:450px;">
            @if(empty($title_info))
                <h1 style="line-height: 500px;text-align: center;">文章不见了。。。</h1>
            @else
                <h2>{{ $title_info->title }}</h2>
                <p class="dateview"><span>发布时间：{{ date("Y-m-d H:i:s",$title_info->update_time) }}</span>
                    <span>作者：{{ $title_info->name }}</span>
                    <span>分类：[<a href="/Home/knowledge?type_id={{ $title_info->type_id }}">{{ $title_info->type }}</a>]</span>
                </p>
                <ul class="nlist">
                    <p>{!! $title_info->content !!}</p>
                </ul>
            @endif
        </div>
        <div class="line"></div>
        <div class="feed">
            <div class="heart" data-content="{{ $title_info->id }}" rel="unlike"></div>
            <div class="praise">{{ $title_info->praise }}</div>
        </div>
        <div style="float: right;margin-right: 5%;margin-top: 15px;" class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more">分享到：</a><a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone">QQ空间</a><a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina">新浪微博</a><a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq">腾讯微博</a><a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren">人人网</a><a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin">微信</a></div>
        <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"知识无处不在，我们一起去发现、一起去学习。","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{"bdSize":16}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
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
                @if(!empty($title_info))
                    <input type="hidden" id="type_id" value="{{ $title_info->type_id }}" />
                @endif
            </ul>
        </div>
        <div class="news">
            <h3>
                <p>最新<span>文章</span></p>
            </h3>
            <ul class="rank">
                @foreach($new_title as $vo)
                    <li><a href="/Home/title_info?t_id={{ $vo->id }}" title="{{ $vo->name }}" >{{ $vo->name }}</a></li>
                @endforeach
            </ul>
            <h3 class="ph">
                <p>点击<span>排行</span></p>
            </h3>
            <ul class="paih">
                @foreach($like_title as $vo)
                    <li><a href="/Home/title_info?t_id={{ $vo->id }}" title="{{ $vo->name }}" >{{ $vo->name }}</a></li>
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

            $(".praise").click(function () {
                var that=$(".heart");
                var praise=parseInt($(".praise").html());
                that.css("background-position","")
                var like=that.attr("rel");
                if(like === 'unlike') {
                    var articles_id = that.data('content');
                    $.ajax({
                        url: '/Home/praise',
                        type:"post",
                        data: {
                            id:articles_id
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        success: function(data) {
                            data = JSON.parse(data);
                            if(data.msg_code==0) {
                                $(".praise").html(praise+1);
                                that.addClass("heartAnimation").attr("rel","like");
                                add_like_obj(articles_id);
                            }else{
                                alert('系统错误');
                            }
                        },
                        error:function () {
                            alert('系统错误');
                        }
                    })
                }
            })
        })
    </script>
@endsection