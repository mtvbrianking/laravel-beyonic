<?php
namespace Bmatovu\Beyonic\Tests;

use Bmatovu\Beyonic\BeyonicServiceProvider;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * Add package service provider.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            BeyonicServiceProvider::class,
        ];
    }

    /**
     * Fake Guzzle HTTP client.
     *
     * @param  mixed $response
     *
     * @return \GuzzleHttp\ClientInterface
     */
    protected function fakeHttpClient($response)
    {
        if (is_array($response)) {
            $responses = $response;
        } else {
            $responses[] = $response;
        }

        $mockHandler = new MockHandler($responses);

        $handlerStack = HandlerStack::create($mockHandler);

        return new Client([
            'base_uri' => 'https://api.example.fake/beyonic/',
            'handler'  => $handlerStack,
            'headers'  => [
                'Accept'       => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }
}
