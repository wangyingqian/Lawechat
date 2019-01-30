<?php
namespace Lawechat\Kernel\Supports\Contract;

use Lawechat\WeChatManager;

interface ProviderServiceInterface
{
    public function register(WeChatManager $manager);
}