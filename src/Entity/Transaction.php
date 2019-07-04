<?php

namespace Bilyiv\Elastic\Apm\Client\Entity;

use Bilyiv\Elastic\Apm\Client\EncodableInterface;
use Bilyiv\Elastic\Apm\Client\IdGenerator;

/**
 * @author Vladyslav Bilyi <vladyslav.bilyi@gmail.com>
 */
class Transaction implements EncodableInterface
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string|null
     */
    private $result;

    /**
     * @var int|null
     */
    private $duration;

    /**
     * @var array
     */
    private $spans = [];

    /**
     * @var Trace
     */
    private $trace;

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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Transaction
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return Transaction
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getResult(): ?string
    {
        return $this->result;
    }

    /**
     * @param null|string $result
     *
     * @return Transaction
     */
    public function setResult(?string $result): self
    {
        $this->result = $result;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDuration(): ?int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     *
     * @return Transaction
     */
    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return array
     */
    public function getSpans(): array
    {
        return $this->spans;
    }

    /**
     * @param Span $span
     *
     * @return Transaction
     */
    public function addSpan(Span $span): self
    {
        $this->spans[] = $span;

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
     * @return Transaction
     */
    public function setTrace(Trace $trace): self
    {
        $this->trace = $trace;

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
     * @return Transaction
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
            'name' => $this->name,
            'type' => $this->type,
            'result' =>$this->result,
            'duration' => $this->duration,
            'span_count' => [
                'started' => count($this->getSpans())
            ],
            'trace_id' => $this->trace->getId(),
        ];

        if ($this->context) {
            $result['context'] = $this->context->toArray();
        }

        return $result;
    }
}