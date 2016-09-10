@extends('Home.master.base')

@section('title')
    <title>关于我</title>
@endsection

@section('style')
    <link href="/Home/css/about.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Architects+Daughter" rel="stylesheet" type="text/css">
    <style>
        .about_photo{
            width: 180px;
            height: 250px;
        }
    </style>
@endsection

@section('content_head')
    <h1 class="t_nav">
        <span>{{ $user->signature }}</span>
        <a href="/Home/index" class="n1">网站首页</a>
        <a href="/Home/about" class="n2">关于我</a>
    </h1>
@endsection

@section('left_content')
    <div class="about left">
        <h2 class="title_tj">
            Just about me
        </h2>
        <ul>
            {{ $user->explain }}
        </ul>
    </div>
@endsection
@section('right_content')
    <aside class="right">
        <div class="about_c">
            <p>姓名：{{ $user->name }} </p>
            <p>性别：
                @if($user->sex==0)
                    男
                @elseif($user->sex==1)
                    女
                @else
                    保密
                @endif
            </p>
            <p>生日：{{ date('Y-m-d',$user->birthday) }}</p>
            <p>学历：{{ $user->diplomas }}</p>
            <p>学校：{{ $user->school }}</p>
            <p>职业：PHP开发</p>
            <p>所在地：{{ $user->location }}</p>
            <img class="about_photo" src="/Home/image/aboutphoto.jpg">
        </div>
    </aside>
@endsection