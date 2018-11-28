@extends('frontend.layouts.main')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/index.css?v=20180605')  }}">
@endsection

@section('head')
    <!-- 标题栏 -->
    <header class="bar bar-nav">
        <a class="icon icon-me pull-left open-panel"></a>
        <h1 class="title">多玩自元化</h1>
    </header>
@endsection

@section('nav')
    <!-- 工具栏 -->
    <nav class="bar bar-tab">
        <a class="tab-item external active" href="#">
            <span class="icon icon-home"></span>
            <span class="tab-label">功能</span>
        </a>
        <a class="tab-item external" href="#">
            <span class="icon icon-edit"></span>
            <span class="tab-label">反馈</span>
        </a>
    </nav>
@endsection

@section('content')
    <div class="card">
        <a href="{{ route('chat.index') }}" class="external">
            <div class="card-header chat-title">聊天室</div>
            <div class="card-content">
                <div class="list-block media-list">
                    <ul>
                        <li class="item-content">
                            <div class="item-media">
                                <img src="http://gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i3/TB10LfcHFXXXXXKXpXXXXXXXXXX_!!0-item_pic.jpg_250x250q60.jpg" width="44">
                            </div>
                            <div class="item-inner">
                                <p class="p_intro">简介：该系统基于 Laravel + Swoole + Redis + MySQL 实现的多人聊天室，欢迎评论和点赞。</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </a>
        <div class="card-footer">
            <a href="#" class="link">赞</a>
            <a href="#" class="link">
                <span class="icon icon-message"></span>
            </a>
        </div>
    </div>
@endsection

@section('sidebar')
    <!-- popup, panel 等放在这里 -->
    <div class="panel-overlay"></div>
    <!-- Left Panel with Reveal effect -->
    <div class="panel panel-left panel-reveal">
        <div class="content-block">
            <div class="index-sidebar">
                <h3>{{ $user->name }}</h3>
                <div class="index-sidebar-content">
                    后续完善...
                </div>
                <a id="logout" href="{{ route('site.logout') }}" class="button button-fill button-danger external">退出登录</a>
            </div>
        </div>
    </div>
@endsection
