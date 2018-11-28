<?php
/**
 * Created by PhpStorm.
 * User: Cheney
 * Date: 2018/5/27
 * Time: 16:00
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

    /**
     * 聊天室首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        return view('frontend.chat-list', compact('user'));
    }

    /**
     *
     * 聊天
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function say(Request $request)
    {
        if (! $request->ajax()) {
            return back();
        }
        $content = $request->input('content');
        if (empty($content)) {
            $this->jsonRes['msg'] = '请输入你要说的话~';
            return response()->json($this->jsonRes);
        }

        $this->jsonRes['msg'] = "你说了：".$content;
        $this->jsonRes['code'] = 200;
        return response()->json($this->jsonRes);
    }
}