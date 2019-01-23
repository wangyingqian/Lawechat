<?php

$app = \Illuminate\Container\Container::getInstance();

$provider = new \LaWeChat\WeChatServiceProvider($app);
$provider->register();
$provider->boot();


$a = $app->make('wechat.manager');