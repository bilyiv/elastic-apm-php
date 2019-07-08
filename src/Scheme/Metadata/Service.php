<?php

namespace Bilyiv\Elastic\Apm\Client\Scheme\Metadata;

use Bilyiv\Elastic\Apm\Client\EncodableInterface;

/**
 * @author Vladyslav Bilyi <vladyslav.bilyi@gmail.com>
 */
class Service implements EncodableInterface
{
    /**
     * @var Agent
     */
    private $agent;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $environment;

    public function __construct(string $name, ?string $environment = null)
    {
        $this->name = $name;
        $this->environment = $environment;
    }

    /**
     * @return Agent|null
     */
    public function getAgent(): ?Agent
    {
        return $this->agent;
    }

    /**
     * @param Agent $agent
     *
     * @return Service
     */
    public function setAgent(Agent $agent): self
    {
        $this->agent = $agent;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getEnvironment(): ?string
    {
        return $this->environment;
    }

    /**
     * @param string $environment
     *
     * @return Service
     */
    public function setEnvironment(string $environment): self
    {
        $this->environment = $environment;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'agent' => $this->agent->toArray(),
            'name' => $this->name,
            'environment' => $this->environment,
        ];
    }
}