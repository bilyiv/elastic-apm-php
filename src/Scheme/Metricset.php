<?php

namespace Bilyiv\Elastic\Apm\Client\Scheme;

use Bilyiv\Elastic\Apm\Client\EncodableInterface;

/**
 * @author Vladyslav Bilyi <vladyslav.bilyi@gmail.com>
 */
class Metricset implements EncodableInterface
{
    /**
     * @var int
     */
    private $timestamp;

    /**
     * @var array
     */
    private $samples = [];

    public function __construct()
    {
        $this->timestamp = (int) (microtime(true) * 1000000);
    }

    /**
     * @param string $name
     * @param $value
     *
     * @return Metricset
     */
    public function addSample(string $name, $value): self
    {
       $this->samples[$name] = ['value' => $value];

       return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'timestamp' => $this->timestamp,
            'samples' => $this->samples,
        ];
    }
}