<?php
namespace Lawechat\OfficialAccount;

use Illuminate\Contracts\Events\Dispatcher;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Manager;
use Lawechat\OfficialAccount\Menu;

class OfficialAccount extends Manager
{
    protected $config;

    protected $app;

    protected $dispatcher;

    public function __construct($config, Application $app, Dispatcher $dispatcher)
    {
        $this->config = $config;
        $this->app = $app;
        $this->dispatcher = $dispatcher;

        parent::__construct($this->app);
    }

    public function createMenuDriver()
    {
        return Menu\Menu::class;
    }


    public function getDefaultDriver()
    {

    }

    public function __get($name)
    {
       return $this->driver($name);
    }

}