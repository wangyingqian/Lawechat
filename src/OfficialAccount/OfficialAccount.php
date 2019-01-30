<?php
namespace Lawechat\OfficialAccount;

use Illuminate\Contracts\Events\Dispatcher;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Manager;

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

        dd($this->config);
    }

    public function getDefaultDriver()
    {
        // TODO: Implement getDefaultDriver() method.
    }
}