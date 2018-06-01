@extends('frontend.layouts.main')

<link rel="stylesheet" href="{{ asset('css/index.css') }}">

@section('head')
    <!-- 标题栏 -->
    <header class="bar bar-nav">
        <a class="icon icon-me pull-left open-panel"></a>
        <h1 class="title">多玩自元化</h1>
    </header>
@show

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
@show

@section('content')
    <div class="card">
        <a href="{{ route('chat.index') }}" class="external">
            {{--<div class="card-header chat-title">11111111</div>--}}
            <div class="card-header chat-title">多人在线聊天室系统</div>
            <div class="card-content">
                <div class="list-block media-list">
                    <ul>
                        <li class="item-content">
                            <div class="item-media">
                                <img src="http://gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i3/TB10LfcHFXXXXXKXpXXXXXXXXXX_!!0-item_pic.jpg_250x250q60.jpg" width="44">
                            </div>
                            <div class="item-inner">
                                <p>简介：该系统基于 Laravel + Swoole + Redis + MySQL 实现的多人聊天室，模式类似于群，欢迎评论和点赞。</p>
                                {{--<p>22222222</p>--}}
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
@show

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