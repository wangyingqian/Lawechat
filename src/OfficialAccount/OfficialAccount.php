<?php
namespace Lawechat\OfficialAccount;

use Illuminate\Contracts\Events\Dispatcher;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Manager;

class OfficialAccount extends Manager
{
    protected $app;

    protected $dispatcher;

    public function __construct(Application $app, Dispatcher $dispatcher)
    {
        $this->app = $app;
        $this->dispatcher = $dispatcher;

        parent::__construct($this->app);

        dd(124);
    }

    public function getDefaultDriver()
    {
        // TODO: Implement getDefaultDriver() method.
    }
}