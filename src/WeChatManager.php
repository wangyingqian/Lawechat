<?php
namespace Lawechat;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Foundation\Application;
use Lawechat\Kernel\Exception\NotAllowedWechatException;
use Lawechat\Kernel\Supports\ArrayAccessAble;
use Lawechat\OfficialAccount\OfficialAccountServiceProvider;

class WeChatManager extends ArrayAccessAble
{
    protected $app;

    protected $dispatcher;

    protected $config;


    public function __construct(Application $app, Dispatcher $dispatcher)
    {
        $this->app = $app;
        $this->dispatcher = $dispatcher;

        parent::__construct();
    }


    public function __get($name)
    {
        $this->{'register'.studly_case($name)}();

        if (! $this->offsetExists($name)){
            throw new NotAllowedWechatException('相应的微信服务加载失败');
        }

        $provider = $this->offsetGet($name);

        return $provider($this->getConfig(),$this->app, $this->dispatcher);
    }

    public function __set($name, $value)
    {
        if (empty($this->offsetExists($name))){
            $this->offsetSet($name, $value);
        }
    }

    public function setConfig($config)
    {
        $this->config = $config;
    }

    public function getConfig()
    {
        return $this->config;
    }

    protected function registerOfficialAccount()
    {
        $provider = new OfficialAccountServiceProvider();

        $provider->register($this);
    }

}