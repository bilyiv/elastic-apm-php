<?php

namespace Bilyiv\Elastic\Apm\Client\Scheme\Metadata;

use Bilyiv\Elastic\Apm\Client\EncodableInterface;

/**
 * @author Vladyslav Bilyi <vladyslav.bilyi@gmail.com>
 */
class Agent implements EncodableInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $version;

    public function __construct(string $name, string $version)
    {
        $this->name = $name;
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'version' => $this->version,
        ];
    }
}