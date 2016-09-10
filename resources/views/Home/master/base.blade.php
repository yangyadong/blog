<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="_token" content="{{ csrf_token() }}" />
    @yield('title')
    <link href="/Home/css/base.css" rel="stylesheet">
    @yield('style')
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
    <p>Design by DanceSmile <a href="#">蜀ICP备11002373号-1</a> <a href="#">网站统计</a></p>
</footer>
</body>
<script type="text/javascript" src="/Home/js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/Home/js/silder.js"></script>
@yield('script')
</html>