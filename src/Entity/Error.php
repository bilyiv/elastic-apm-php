<?php

namespace Bilyiv\Elastic\Apm\Client\Entity;

use Bilyiv\Elastic\Apm\Client\EncodableInterface;
use Bilyiv\Elastic\Apm\Client\IdGenerator;

/**
 * @author Vladyslav Bilyi <vladyslav.bilyi@gmail.com>
 */
class Error implements EncodableInterface
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string|null
     */
    private $culprit;

    /**
     * @var \Throwable|null
     */
    private $exception;

    /**
     * @var Trace
     */
    private $trace;

    /**
     * @var Transaction
     */
    private $transaction;

    /**
     * @var Context|null
     */
    private $context;

    /**
     * @var float
     */
    private $createdAt;

    public function __construct()
    {
        $this->id = IdGenerator::generate();
        $this->createdAt = microtime(true);;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getCulprit(): ?string
    {
        return $this->culprit;
    }

    /**
     * @param string $culprit
     *
     * @return Error
     */
    public function setCulprit(string $culprit): self
    {
        $this->culprit = $culprit;

        return $this;
    }

    /**
     * @return \Throwable|null
     */
    public function getException(): ?\Throwable
    {
        return $this->exception;
    }

    /**
     * @param \Throwable $exception
     *
     * @return Error
     */
    public function setException(\Throwable $exception): self
    {
        $this->exception = $exception;

        return $this;
    }

    /**
     * @return Trace|null
     */
    public function getTrace(): ?Trace
    {
        return $this->trace;
    }

    /**
     * @param Trace $trace
     *
     * @return Error
     */
    public function setTrace(Trace $trace): self
    {
        $this->trace = $trace;

        return $this;
    }

    /**
     * @return Transaction
     */
    public function getTransaction(): Transaction
    {
        return $this->transaction;
    }

    /**
     * @param Transaction $transaction
     *
     * @return Error
     */
    public function setTransaction(Transaction $transaction): self
    {
        $this->transaction = $transaction;

        return $this;
    }

    /**
     * @return Context|null
     */
    public function getContext(): ?Context
    {
        return $this->context;
    }

    /**
     * @param Context $context
     *
     * @return Error
     */
    public function setContext(Context $context): self
    {
        $this->context = $context;

        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $result = [
            'id' => $this->id,
            'culprit' => $this->culprit,
            'trace_id' => $this->trace->getId(),
            'transaction_id' => $this->transaction->getId(),
            'parent_id' => $this->transaction->getId(),
        ];

        if ($this->exception) {
            $result['exception'] = [
                'type' => \get_class($this->exception),
                'message' => $this->exception->getMessage(),
                'code' => $this->exception->getCode()
            ];
        }

        if ($this->context) {
            $result['context'] = $this->context->toArray();
        }

        return $result;
    }
}