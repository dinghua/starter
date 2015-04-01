<?php
use Overtrue\Wechat\Wechat;

class WechatController extends BaseController {

    public function index()
    {
        $wechat = Wechat::make(Config::get('wechat'));
        $server = $wechat->on('message', function ($message)
        {
            Log::info("收到来自'{$message['FromUserName']}'的消息：{$message['Content']}");
        });
        $result = $wechat->serve();
        return $result;
    }
}
