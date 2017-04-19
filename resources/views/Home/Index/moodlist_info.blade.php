@extends('Home.master.base')

@section('title')
    <title>所思所悟</title>
@endsection

@section('style')
    <link href="/Home/css/mood.css" rel="stylesheet">
@endsection

@section('content_head')
    <h1 class="t_nav">
        <span>删删写写，回回忆忆，虽无法行云流水，却也可碎言碎语。</span>
        <a href="/Home/index" class="n1">网站首页</a>
        <a href="/Home/moodlist" class="n2">所思所悟</a>
    </h1>
    <div class="bloglist">
        <ul class="arrow_box" style="text-align: center;">
            <div>
                <p> {!! $title_info->content !!}</p>
            </div>
            <span class="dateview">{{ date('Y-m-d H:i:s',$title_info->update_time) }}</span>
        </ul>
        <div class="feed">
            <div class="heart" data-content="{{ $title_info->id }}" rel="unlike"></div>
            <div class="praise">{{ $title_info->praise }}</div>
        </div>
        <div style="float: right;margin-right: 28%;margin-top: 15px;" class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more">分享到：</a><a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone">QQ空间</a><a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina">新浪微博</a><a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq">腾讯微博</a><a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren">人人网</a><a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin">微信</a></div>
        <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"知识无处不在，我们一起去发现、一起去学习。","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{"bdSize":16}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
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