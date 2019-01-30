<?php
namespace Lawechat\Kernel\Contract;



use Lawechat\WeChatManager;

interface ProviderServiceInterface
{
    public function register(WeChatManager $manager);
}