<?php

namespace Bmatovu\Beyonic\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use Illuminate\Container\Container;
use Illuminate\Contracts\Config\Repository;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

trait HttpClient
{
    /**
     * Create concrete HTTP client.
     *
     * @throws \Exception
     *
     * @return \GuzzleHttp\ClientInterface
     */
    protected function makeClient()
    {
        $config = Container::getInstance()->make(Repository::class);

        $handlerStack = HandlerStack::create();

        if ($config->get('beyonic.debug')) {
            $handlerStack->push($this->getLogMiddleware());
        }

        $options = array_merge([
            'handler' => $handlerStack,
            // 'progress' => function () {
            //     echo '. ';
            // },
            'base_uri' => $config->get('beyonic.api.base_uri'),
            'headers' => [
                'Accept' => 'application/json',
                'Beyonic-Version' => $config->get('beyonic.api.version'),
                'Authorization' => 'Token '.$config->get('beyonic.api.token'),
                'Content-Type' => 'application/json',
            ],
        ], (array) $config->get('beyonic.guzzle.options'));

        return new Client($options);
    }

    /**
     * Get log middleware.
     *
     * @throws \Exception
     *
     * @return callable GuzzleHttp middleware
     */
    protected function getLogMiddleware()
    {
        $logManager = Container::getInstance()->make(LoggerInterface::class);
        $logger = $logManager->getLogger();
        $streamHandler = new StreamHandler(storage_path('logs/beyonic.log'));
        $logger->pushHandler($streamHandler, Logger::DEBUG);
        $messageFormatter = new MessageFormatter(MessageFormatter::DEBUG);

        return Middleware::log($logger, $messageFormatter);
    }
}
