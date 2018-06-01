@extends('frontend.layouts.main')
<link rel="stylesheet" href="{{ asset('css/chat.css') }}">
@section('head')
    <!-- 标题栏 -->
    <header class="bar bar-nav">
        <a href="{{ route('index') }}" class="icon icon-left pull-left external"></a>
        <a class="icon icon-friends pull-right open-panel"></a>
        <h1 class="title">多人在线聊天系统</h1>
        {{--<h1 class="title">33333</h1>--}}
    </header>
@show

@section('content')
    <div class="chat-content">
        <ul>
            <li>
                <div class="user-name">我都去看情况哦啊OK嗯dsdd的人工费</div>
                <div class="user-content">
                    啊啊谓无无无
                </div>
            </li>
            <li id="chat-my">
                <div class="my-name">我啊啊啊啊啊啊啊啊啊吾</div>
                <div class="my-content">
                    啊啊啊啊啊啊啊啊啊吾
                </div>
            </li>
            <li>
                <div class="user-name">我都费</div>
                <div class="user-content">
                    啊
                </div>
            </li>
        </ul>
    </div>
    <div class="input-content">
        <div class="input-say">
            <input type="text" class="input-item" placeholder="请输入需要说的~">
        </div>
        <div class="chat-button">
            <button href="#" class="button button-big button-fill button-success button-sned">发送</button>
        </div>
    </div>
@show

@section('sidebar')
    <div class="panel-overlay"></div>
    <!-- Left Panel with Reveal effect -->
    <div class="panel panel-right panel-reveal">
        <div class="content-block">
            <h4 class="chat_right_h4">在线用户列表</h4>
            <div class="list-group">
                <ul>
                    <li>
                        <div class="item-content">
                            <div class="item-inner">
                                <div class="item-title">张三</div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-content">
                            <div class="item-inner">
                                <div class="item-title">李四</div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-content">
                            <div class="item-inner">
                                <div class="item-title">王二</div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-content">
                            <div class="item-inner">
                                <div class="item-title">码字</div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-content">
                            <div class="item-inner">
                                <div class="item-title">你好</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@show