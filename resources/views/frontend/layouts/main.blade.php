<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('css')
        <link rel="stylesheet" href="{{ asset('css/light7.min.css') }}">
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @show
    <title>自玩多元化</title>
</head>
<body>
<!-- page 容器 -->
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
<!-- popup, panel 等放在这里 -->
@yield('sidebar')

@section('js')
    <script type='text/javascript' src='{{ asset('js/jquery.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/light7.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/frontend.js') }}'></script>
@show
</body>
</html>