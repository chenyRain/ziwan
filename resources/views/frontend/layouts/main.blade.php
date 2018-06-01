<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>自玩多元化</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!--    <link rel="shortcut icon" href="/favicon.ico">-->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="{{ asset('css/light7.min.css') }}">
</head>
<body>
<div class="page-group">
    <!-- 单个page ,第一个.page默认被展示-->
    <div class="page">
        <!-- 标题栏 -->
        @yield('head')

        <!-- 工具栏 -->
        @yield('nav')

        <!-- 这里是页面内容区 -->
        <div class="content">
            @yield('content')
        </div>
    </div>
</div>

<!-- Left Panel with Reveal effect -->
@section('sidebar')
    <!-- popup, panel 等放在这里 -->
    <div class="panel-overlay"></div>
    <!-- Left Panel with Reveal effect -->
    <div class="panel panel-left panel-reveal">
        <div class="content-block">
            <p>用户信息</p>
        </div>
    </div>
@show

<script type='text/javascript' src='{{ asset('js/jquery.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('js/light7.min.js') }}'></script>
</body>
</html>