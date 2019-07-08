<?php

namespace Bilyiv\Elastic\Apm\Client\Scheme\Context;

use Bilyiv\Elastic\Apm\Client\EncodableInterface;

/**
 * @author Vladyslav Bilyi <vladyslav.bilyi@gmail.com>
 */
class Response implements EncodableInterface
{
    /**
     * @var int|null
     */
    private $statusCode;

    /**
     * @return int|null
     */
    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     *
     * @return Response
     */
    public function setStatusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'status_code' => $this->statusCode,
        ];
    }
}

