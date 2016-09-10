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
        @foreach($moodlist_title as $vo)
            <a href="/Home/moodlist_info?t_id={{ $vo->id }}">
                <ul class="arrow_box">
                    <div class="sy">
                        @if(!empty($vo->image))
                            <img src="{{ $vo->image }}">
                        @endif
                        <ul class="nlist">
                            <p> {!! $vo->content !!}</p>
                        </ul>
                    </div>
                    <span class="dateview">{{ date('Y-m-d H:i:s',$vo->update_time) }}</span>
                </ul>
            </a>
        @endforeach
        <ul id="more">
            <a title="加载更多" href="javascript:void(0);" class="readmore more">加载更多</a>
            <input type="hidden" id="page" value="2" />
        </ul>
    </div>
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
                        '/Home/moodlist_more',
                        {
                            page:page
                        },
                        function (data) {
                            if(data!=''){
                                var html;
                                for(var i = 0;i < data.length; i++){
                                    html = '<a href="/Home/moodlist_info?t_id='+data[i]["id"]+'"><ul class="arrow_box"><div class="sy">';
                                    if(data[i]["image"]!=''){
                                        html += '<img src="'+data[i]["image"]+'">';
                                    }
                                    html += '<ul class="nlist"><p>'+data[i]["content"]+'</p></ul></div>'
                                            +'<span class="dateview">'+format(parseInt(data[i]["update_time"]) * 1000)
                                            +'</span></ul></a>';
                                    $("#more").before(html);
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