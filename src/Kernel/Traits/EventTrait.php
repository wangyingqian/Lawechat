<?php
namespace Lawechat\Kerner\Traits;

use Illuminate\Events\Dispatcher;

trait EventTrait
{
    private $dispatcher;

    protected $listenerClass;

    protected $listeners = [];

    /**
     * 注册事件监听
     *
     * @return bool
     */
    protected function registerEvent()
    {
        if (empty($this->listenerClass) || empty($this->dispatcher)){
            return true;
        }

        if (!class_exists($this->listenerClass)){
            throw new \RuntimeException('事件监听器定义错误');
        }

        if ($this->dispatcher instanceof Dispatcher){
            foreach ($this->listeners as $listener => $event){
                $this->dispatcher->listen($event, $this->listenerClass.'@'.$listener);
            }
        }

        return true;
    }

    /**
     * 触发事件
     *
     * @param $listener
     * @param mixed ...$args
     *
     * @return bool
     */
    protected function dispatchEvent($listener, ...$args)
    {
        if (isset($this->listeners[$listener])){
            return $this->dispatcher->dispatch(new $this->listeners[$listener](...$args));
        }

        return true;
    }

}