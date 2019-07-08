<?php

namespace Bilyiv\Elastic\Apm\Client;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * @author Vladyslav Bilyi <vladyslav.bilyi@gmail.com>
 */
class Client
{
    /**
     * @var string
     */
    public static $name = 'php-agent';

    /**
     * @var string
     */
    public static $version = '1.0';

    /**
     * @var string
     */
    private $url;

    /**
     * @var null|string
     */
    private $secretToken;

    /**
     * @var Encoder
     */
    private $encoder;

    public function __construct(string $url, ?string $secretToken, Encoder $encoder)
    {
        $this->url = $url;
        $this->secretToken = $secretToken;
        $this->encoder = $encoder;
    }

    /**
     * @param Register $register
     *
     * @return ResponseInterface|null
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function send(Register $register): ?ResponseInterface
    {
        $body =
            $this->encoder->encodeMetadata($register->getMetadata()) .
            $this->encoder->encodeErrors($register->getErrors()) .
            $this->encoder->encodeTransactions($register->getTransactions()) .
            $this->encoder->encodeMetricsets($register->getMetricsets());

        if (!$body) {
            return null;
        }

        return HttpClient::create()->request('POST', $this->url . '/intake/v2/events', [
            'body' => $body,
            'auth_bearer' => $this->secretToken,
            'headers' => [
                'Content-Type' => 'application/x-ndjson'
            ]
        ]);
    }
}