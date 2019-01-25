<?php
namespace LaWeChat;

use Illuminate\Support\ServiceProvider;

class WeChatServiceProvider extends ServiceProvider
{
    /**
     * 注册微信管理者
     */
    public function register()
    {
        $this->app->singleton('wechat.manager', function ($app) {
            return new WeChatManager($app, $app['events']);
        });
    }

    public function boot()
    {
        $weManager = $this->app->make('wechat.manager');

        $weManager->boot();
    }
}