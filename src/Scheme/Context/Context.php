<?php

namespace Bilyiv\Elastic\Apm\Client\Scheme\Context;

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
     * @var Response
     */
    private $response;

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
     * @return Response|null
     */
    public function getResponse(): ?Request
    {
        return $this->response;
    }

    /**
     * @param Response $response
     *
     * @return Context
     */
    public function setResponse(Response $response): self
    {
        $this->response = $response;

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

        if ($this->response) {
            $result['response'] = $this->response->toArray();
        }

        return $result;
    }
}

