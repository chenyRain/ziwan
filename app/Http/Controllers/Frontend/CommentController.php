<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\BaseController;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class CommentController extends BaseController
{
    private $comment_frequency = 5; // 评论频率
    private $comment_key = 'comment_key'; // 评论key

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = max(1, intval($request->input('page')));
        $skip = ($page - 1) * $this->offset;
        $m_id = intval($request->input('m_id'));

        if (empty($m_id)) {
            $list = [];
        } else {
            $list = DB::table('comments as c')
                ->select('c.ctime', 'c.content', 'u.name')
                ->join('users as u', 'u.id', 'c.uid')
                ->where('c.m_id', $m_id)
                ->skip($skip)
                ->take($this->offset)
                ->get()
                ->toArray();
        }

        if ($request->ajax()) {
            $this->jsonRes['code'] = 1;
            $this->jsonRes['result'] = $list;
            return Response()->json($this->jsonRes);
        } else {
            return view('frontend.comments', compact('list', 'm_id'));
        }
    }


    /**
     * Store a newly created resource in storage.
     * 添加评论
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $m_id = intval($request->input('m_id'));
        $content = htmlspecialchars($request->input('content'));
        try {
            // 设置频率
            if (! empty(Redis::get($this->comment_key))) {
                throw new \Exception('操作太频繁了！');
            }
            if (empty($m_id)) {
                throw new \Exception('参数错误！');
            }
            if (empty($content)) {
                throw new \Exception('评论内容不能为空！');
            }
            if (mb_strlen($content) > 140) {
                throw new \Exception('评论内容不能超过140字！');
            }

            $data['m_id'] = $m_id;
            $data['uid'] = Auth::id();
            $data['content'] = $content;
            $data['ctime'] = date('Y-m-d H:i:s', time());
            // 添加评论
            $res = Comments::insertGetId($data);
            if (empty($res)) {
                throw new \Exception('操作失败！');
            }

            // 获取用户昵称
            $user = Auth::user();
            $data['nickname'] = $user->name;

            // 设置访问频率
            Redis::setex($this->comment_key, $this->comment_frequency, $this->comment_frequency);

            $this->jsonRes['code'] = 1;
            $this->jsonRes['result'] = $data;
            $this->jsonRes['msg'] = '发布成功';
        } catch (\Exception $e) {
            $this->jsonRes['msg'] = $e->getMessage();
        }
        return response()->json($this->jsonRes);
    }
}
