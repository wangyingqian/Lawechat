<?php
namespace Lawechat\Kernel\Support\Contract;

use Lawechat\WeChatManager;

interface ProviderServiceInterface
{
    public function register(WeChatManager $manager);
}