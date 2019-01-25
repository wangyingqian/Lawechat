<?php
namespace LaWeChat\OfficialAccount;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Foundation\Application;

class OfficialAccount
{
    protected $app;

    public function __construct(Application $app, Dispatcher $dispatcher)
    {
        $this->app = $app;
    }
}