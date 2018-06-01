@extends('frontend.layouts.main')

<link rel="stylesheet" href="{{ asset('css/index.css') }}">

@section('head')
    <header class="bar bar-nav">
        <a href="{{ route('site.register') }}">
            <button class="button button-link button-nav pull-right">
                登 录
                <span class="icon icon-right"></span>
            </button>
        </a>
        <h1 class="title">注 册</h1>
    </header>
@show

@section('content')
    <div id="list-block-login" class="list-block">
        <ul>
            <!-- Text inputs -->
            <li>
                <div class="item-content">
                    <div class="item-media"><i class="icon icon-form-name"></i></div>
                    <div class="item-inner">
                        <div class="item-title label">用户名</div>
                        <div class="item-input">
                            <input type="text" placeholder="Your name">
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="item-content">
                    <div class="item-media"><i class="icon icon-form-password"></i></div>
                    <div class="item-inner">
                        <div class="item-title label">密码</div>
                        <div class="item-input">
                            <input type="password" placeholder="Password" class="">
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="item-content">
                    <div class="item-media"><i class="icon icon-form-password"></i></div>
                    <div class="item-inner">
                        <div class="item-title label">确认密码</div>
                        <div class="item-input">
                            <input type="password" placeholder="Confirm Password" class="">
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="content-block">
        <div class="row">
            <div class="col-100"><a href="#" class="button button-big button-fill button-success">登 录</a></div>
        </div>
    </div>
@show