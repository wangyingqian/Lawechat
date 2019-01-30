<?php
namespace Lawechat\OfficialAccount;

use Lawechat\Kernel\Supports\Contract\ProviderServiceInterface;
use Lawechat\WeChatManager;


class OfficialAccountServiceProvider implements ProviderServiceInterface
{
    public function register(WeChatManager $manager)
    {
        $manager['official_account'] = function ($app, $dispatcher){
            return new OfficialAccount($app, $dispatcher);
        };
    }
}