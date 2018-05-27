<?php
/**
 * Created by PhpStorm.
 * User: Cheney
 * Date: 2018/5/27
 * Time: 16:00
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;

class ChatController extends Controller
{

    /**
     * 聊天室首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.chat-list');
    }
}