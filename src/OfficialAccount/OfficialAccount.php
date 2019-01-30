<?php
namespace Lawechat\OfficialAccount;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Foundation\Application;

class OfficialAccount
{
    protected $app;

    protected $dispatcher;

    public function __construct(Application $app, Dispatcher $dispatcher)
    {
        $this->app = $app;
        $this->dispatcher = $dispatcher;
    }
}