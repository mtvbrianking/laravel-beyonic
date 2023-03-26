<?php

namespace Bmatovu\Beyonic\Tests;

use Bmatovu\Beyonic\Services\Collection;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;

/**
 * @see \Bmatovu\Beyonic\Services\Collection
 */
class CollectionTest extends TestCase
{
    public function testCanAskPayeeToPay()
    {
        $body = ['key' => 'value'];

        $response = new Response(201, [], json_encode($body));

        $client = $this->fakeHttpClient($response);

        // ...

        $collector = new Collection();

        static::assertInstanceOf(ClientInterface::class, $collector->getClient());

        $collector->setClient($client);

        $response = $collector->ask('+80000000001', 3000);

        static::assertInstanceOf(Response::class, $response);
    }

    public function testCanGetSingleCollection()
    {
        $body = ['key' => 'value'];

        $response = new Response(200, [], json_encode($body));

        $client = $this->fakeHttpClient($response);

        // ...

        $collector = new Collection();

        $collector->setClient($client);

        $response = $collector->get('22594213');

        static::assertInstanceOf(Response::class, $response);
    }

    public function testCanGetAllCollections()
    {
        $body = ['key' => 'value'];

        $response = new Response(200, [], json_encode($body));

        $client = $this->fakeHttpClient($response);

        // ...

        $collector = new Collection();

        $collector->setClient($client);

        $response = $collector->all();

        static::assertInstanceOf(Response::class, $response);
    }
}
