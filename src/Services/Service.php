<?php

namespace Dykyi\Services;

use Dykyi\Services\Events\Dispatcher;
use Dykyi\Services\WeatherForecastService\WeatherForecastRequest;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class Service
 * @package Dykyi\Services
 */
abstract class Service
{
    /** @var EventDispatcherInterface */
    private $eventDispatcher;

    public function __construct()
    {
        $this->eventDispatcher = Dispatcher::create();
    }

    public function getEventDispatcher()
    {
        return $this->eventDispatcher;
    }

    /**
     * @param WeatherForecastRequest $request
     * @return mixed
     */
    abstract public function execute(WeatherForecastRequest $request);
}