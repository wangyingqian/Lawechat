<?php
namespace LaWeChat;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Foundation\Application;
use LaWeChat\OfficialAccount\OfficialAccount;

class WeChatManager
{
    protected $app;

    protected $dispatcher;

    protected $wechat = [
        'officialAccount' => OfficialAccount::class
    ];

    public function __construct(Application $app, Dispatcher $dispatcher)
    {
        $this->app = $app;
        $this->dispatcher = $dispatcher;
    }

    /**
     * 注册微信相应服务
     */
    public function boot()
    {
        //注册核心服务

        $this->register();
    }

    protected function register()
    {
        foreach ($this->wechat as $contract => $concrete){
            $this->app->singleton($contract, function () use ($concrete) {
                return new $concrete($this->app, $this->dispatcher);
            });
        }
    }

}