<?php

namespace Bilyiv\Elastic\Apm\Client\Scheme;

use Bilyiv\Elastic\Apm\Client\EncodableInterface;
use Bilyiv\Elastic\Apm\Client\Scheme\Metadata\Service;

/**
 * @author Vladyslav Bilyi <vladyslav.bilyi@gmail.com>
 */
class Metadata implements EncodableInterface
{
    /**
     * @var Service
     */
    private $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    /**
     * @return Service
     */
    public function getService(): Service
    {
        return $this->service;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'service' => $this->service->toArray(),
        ];
    }
}