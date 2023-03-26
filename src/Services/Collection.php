<?php

namespace Bmatovu\Beyonic\Services;

use Bmatovu\Beyonic\Traits\HttpClient;
use GuzzleHttp\ClientInterface;
use Illuminate\Container\Container;
use Illuminate\Contracts\Config\Repository;

class Collection
{
    use HttpClient;

    /**
     * HTTP client.
     *
     * @var \GuzzleHttp\ClientInterface
     */
    protected $client;

    /**
     * Constructor.
     *
     * @uses \Illuminate\Container\Container
     */
    public function __construct()
    {
        $this->client = $this->makeClient();
    }

    /**
     * Set HTTP client.
     */
    public function setClient(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * Get HTTP client.
     *
     * @return \GuzzleHttp\ClientInterface
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Collect funds from a customer.
     *
     * @param string $payee
     * @param float $amount
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function ask($payee, $amount)
    {
        $config = Container::getInstance()->make(Repository::class);

        return $this->client->request('POST', 'collectionrequests', [
            'json' => array_merge([
                'phonenumber' => $payee,
                'amount' => $amount,
            ], $config->get('beyonic.collection')),
        ]);
    }

    /**
     * Retrieve a single collection.
     *
     * @param int $collectionId
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get($collectionId)
    {
        return $this->client->request('GET', "collectionrequests/{$collectionId}");
    }

    /**
     * Retrieve all collections.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function all()
    {
        return $this->client->request('GET', 'collectionrequests');
    }
}
