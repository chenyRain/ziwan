@extends('frontend.layouts.main')

@section('head')
    <!-- 标题栏 -->
    <header class="bar bar-nav">
        <a href="{{ route('index') }}" class="icon icon-left pull-left external"></a>
        <a class="icon icon-friends pull-right open-panel"></a>
        <h1 class="title">在线聊天系统</h1>
    </header>
@show

@section('content')
    <div class="list-block">
        <ul>
            <li class="item-content">
                <div class="item-inner">
                    <div class="item-title">商品名称</div>
                </div>
            </li>
            <li class="item-content">
                <div class="item-inner">
                    <div class="item-right">极致超薄型</div>
                </div>
            </li>
        </ul>
    </div>
    <div class="content-padded chat-content">
        <div class="searchbar">
            <div class="search-input">
                <input type="text" name="content" placeholder='请输入聊天内容...'/>
            </div>
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