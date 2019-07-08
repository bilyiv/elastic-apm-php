<?php

namespace Bilyiv\Elastic\Apm\Client\Scheme\Context;

use Bilyiv\Elastic\Apm\Client\EncodableInterface;

/**
 * @author Vladyslav Bilyi <vladyslav.bilyi@gmail.com>
 */
class Request implements EncodableInterface
{
    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $url;

    public function __construct(string $method, string $url)
    {
        $this->method = $method;
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'method' => $this->method,
            'url' => [
                'pathname' => $this->url
            ],
        ];
    }
}

