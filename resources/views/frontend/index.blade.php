@extends('frontend.layouts.main')

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
            <div class="card-header">在线聊天室系统</div>
            <div class="card-content">
                <div class="list-block media-list">
                    <ul>
                        <li class="item-content">
                            <div class="item-media">
                                <img src="http://gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i3/TB10LfcHFXXXXXKXpXXXXXXXXXX_!!0-item_pic.jpg_250x250q60.jpg" width="44">
                            </div>
                            <div class="item-inner">
                                <div class="item-subtitle">在线人数：<b class="b_chat_num">1233</b> 人</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </a>
        <div class="card-footer">
            <a href="#" class="link">赞</a>
            <a href="#" class="link">123 评论</a>
        </div>
    </div>
@show