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
    public function test_can_ask_payee_to_pay()
    {
        $body = ['key' => 'value'];

        $response = new Response(201, [], json_encode($body));

        $client = $this->fakeHttpClient($response);

        // ...

        $collector = new Collection();

        $this->assertInstanceOf(ClientInterface::class, $collector->getClient());

        $collector->setClient($client);

        $response = $collector->ask('+80000000001', 3000);

        $this->assertInstanceOf(Response::class, $response);
    }

    public function test_can_get_single_collection()
    {
        $body = ['key' => 'value'];

        $response = new Response(200, [], json_encode($body));

        $client = $this->fakeHttpClient($response);

        // ...

        $collector = new Collection();

        $collector->setClient($client);

        $response = $collector->get('22594213');

        $this->assertInstanceOf(Response::class, $response);
    }

    public function test_can_get_all_collections()
    {
        $body = ['key' => 'value'];

        $response = new Response(200, [], json_encode($body));

        $client = $this->fakeHttpClient($response);

        // ...

        $collector = new Collection();

        $collector->setClient($client);

        $response = $collector->all();

        $this->assertInstanceOf(Response::class, $response);
    }
}
