<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="_token" content="{{ csrf_token() }}" />
    @yield('title')
    <link href="/Home/css/base.css" rel="stylesheet">
    @yield('style')
    <link href="{{asset('/assets')}}/css/bootstrap.min.css" rel="stylesheet"/>
    <!--[if lt IE 9]>
    <script src="/Home/js/modernizr.js"></script>
    <![endif]-->
</head>
<body>
@include('Home.master.header')

@yield('banner')

<article class="aboutcon moodlist blogs">
    @yield('content_head')
    @yield('left_content')
    @yield('right_content')
</article>
<footer>
    <div style="width:500px;margin:0 auto; padding:20px 0;">
        <a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=41162202000006"
           style="display:inline-block;text-decoration:none;height:20px;line-height:20px;"><img
                    src="/image/beian.gov.png"
                    style="float:left;"/>
            <p style="float:left;height:20px;line-height:20px;margin: 0px 0px 0px 5px; color:#939393;">豫公网安备
                41162202000006号</p></a>
        <a target="_blank" href="http://www.miitbeian.gov.cn"
           style="display:inline-block;text-decoration:none;height:20px;line-height:20px;"><p
                    style="float:left;height:20px;line-height:20px;margin: 0px 0px 0px 5px; color:#939393;">
                豫ICP备17029407号-1</p></a>
    </div>
</footer>
</body>
<script type="text/javascript" src="/Home/js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/Home/js/silder.js"></script>
@yield('script')
</html>