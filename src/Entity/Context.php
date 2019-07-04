<?php

namespace Bilyiv\Elastic\Apm\Client\Entity;

use Bilyiv\Elastic\Apm\Client\EncodableInterface;

/**
 * @author Vladyslav Bilyi <vladyslav.bilyi@gmail.com>
 */
class Context implements EncodableInterface
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @return Request|null
     */
    public function getRequest(): ?Request
    {
        return $this->request;
    }

    /**
     * @param Request $request
     *
     * @return Context
     */
    public function setRequest(Request $request): self
    {
        $this->request = $request;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $result = [];

        if ($this->request) {
            $result['request'] = $this->request->toArray();
        }

        return $result;
    }
}

