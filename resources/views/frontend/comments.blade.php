@extends('frontend.layouts.main')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/index.css?v=20180605')  }}">
@endsection

@section('head')
<!-- 标题栏 -->
<header class="bar bar-nav">
    <a href="{{ route('index') }}" class="icon icon-left pull-left external"></a>
    <h1 class="title">聊天室</h1>
</header>
@endsection

@section('content')
<div class="list-block">
    <ul>
        <li class="align-top">
            <div class="item-content">
                <div class="item-inner">
                    <div class="col-50 comment-send">
                        <div attr-id="{{ $m_id }}" class="button button-big button-fill button-success comment-button">发送</div>
                    </div>
                    <div class="item-input">
                        <textarea class="comment-textarea" placeholder="文明上网，理性发言"></textarea>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>
<div class="list-block media-list">
    <ul class="comment-list">
        @if(!empty($list))
            @foreach($list as $item)
        <li>
            <div class="item-inner">
                <div class="item-title-row">
                    <div class="item-title comment-username">{{ $item->name }}</div>
                    <div class="item-after time-color">{{ $item->ctime }}</div>
                </div>
                <div class="item-text comment-content">{{ $item->content }}</div>
            </div>
        </li>
            @endforeach
        @endif
    </ul>
    <!-- 加载提示符 -->
    <div class="infinite-scroll-preloader">

    </div>
    <div class="page-bottom"></div>
</div>
@endsection