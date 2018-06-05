<?php

namespace App\Services;
use Hhxsv5\LaravelS\Swoole\WebSocketHandlerInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

/**
 * @see https://wiki.swoole.com/wiki/page/400.html
 */
class WebSocketService implements WebSocketHandlerInterface
{
    /**
     * 声明没有参数的构造函数
     * WebSocketService constructor.
     */
    public function __construct()
    {

    }


    /**
     * 监听WebSocket连接打开事件，连接成功后，触发open事件
     * @param \swoole_websocket_server $server
     * @param \swoole_http_request $request
     */
    public function onOpen(\swoole_websocket_server $server, \swoole_http_request $request)
    {
        // 获取用户信息，绑定fd
//        $user = $request->user();
        \Log::info($request->fd);
//        Redis::set($user->id.'_'.$request->fd, serialize($user));
//        Redis::lpush('chat:uid:fd', $user->id.'_'.$request->fd);

        // 推送所有用户
//        $msg = [
//            'all' => $this->getAll(),
//            'type' => 'openSuccess'
//        ];
//        $server->push($request->fd, json_encode($msg));

        $msg = [
            'type' => 'open',
//            'name' => $user->name,
//            'uid' => $user->id,
//            'message' => '欢迎 '. $user->name . '来到聊天室~'
            'message' => '欢迎 '.$user->id.' 来到聊天室~'
        ];
        $server->push($request->fd, json_encode($msg));
        // 在触发onOpen事件之前Laravel的生命周期已经完结，所以Laravel的Request、Session是可用的
//        \Log::info('New WebSocket connection', [$request->fd, request()->all(), session()->getId(), session('xxx')]);
//        $server->push($request->fd, 'Welcome to LaravelS');
        // throw new \Exception('an exception');// 此时抛出的异常上层会忽略，并记录到Swoole日志，需要开发者try/catch捕获处理
    }


    /**
     * 所有用户
     * @return array
     */
    private function getAll()
    {
        $all_key = Redis::lrange('chat:uid:fd', 0, -1);
        $users = [];
        foreach ($all_key as $item) {
            $users[] = unserialize(Redis::get($item));
        }
        return $users;
    }


    /**
     * 监听WebSocket消息事件，客户端向服务端发送消息时，触发message事件
     * @param \swoole_websocket_server $server
     * @param \swoole_websocket_frame $frame
     */
    public function onMessage(\swoole_websocket_server $server, \swoole_websocket_frame $frame)
    {
        $user = Auth::user();
        $msg = [
            'type' => 'message',
            'message' => $frame->data,
            'name' => $user->name,
            'uid' => $user->id
        ];
        $server->push($frame->fd, json_encode($msg));
//        \Log::info('Received message', [$frame->fd, $frame->data, $frame->opcode, $frame->finish]);
//        $server->push($frame->fd, date('Y-m-d H:i:s'));
        // throw new \Exception('an exception');// 此时抛出的异常上层会忽略，并记录到Swoole日志，需要开发者try/catch捕获处理
    }


    /**
     * 监听WebSocket连接关闭事件
     * @param \swoole_websocket_server $server
     * @param $fd
     * @param $reactorId
     */
    public function onClose(\swoole_websocket_server $server, $fd, $reactorId)
    {
        $user = $this->user;
        $msg = [
            'type' => 'close',
            'uid' => $user->id,
            'message' => $user->name." 离开了聊天室~~~"
        ];
        $server->push($fd, json_encode($msg));
        Redis::del($user->id.$fd);
        // throw new \Exception('an exception');// 此时抛出的异常上层会忽略，并记录到Swoole日志，需要开发者try/catch捕获处理
    }
}