<?php

namespace Bilyiv\Elastic\Apm\Client;

use Bilyiv\Elastic\Apm\Client\Scheme\Error;
use Bilyiv\Elastic\Apm\Client\Scheme\Metadata;
use Bilyiv\Elastic\Apm\Client\Scheme\Metricset;
use Bilyiv\Elastic\Apm\Client\Scheme\Transaction;

/**
 * @author Vladyslav Bilyi <vladyslav.bilyi@gmail.com>
 */
class Register
{
    /**
     * @var array
     */
    private $transactions = [];

    /**
     * @var array
     */
    private $errors = [];

    /**
     * @var array
     */
    private $metricsets = [];

    /**
     * @var Metadata|null
     */
    private $metadata;

    /**
     * @var Register
     */
    private static $instance;

    private function __construct() {}

    /**
     * @return array|Transaction[]
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

    /**
     * @param Transaction $transaction
     */
    public function addTransaction(Transaction $transaction)
    {
        $this->transactions[$transaction->getId()] = $transaction;
    }

    /**
     * @return array|Error[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @param Error $error
     */
    public function addError(Error $error)
    {
        $this->errors[$error->getId()] = $error;
    }

    /**
     * @return array|Metricset[]
     */
    public function getMetricsets(): array
    {
        return $this->metricsets;
    }

    /**
     * @param Metricset $metricset
     */
    public function addMetricset(Metricset $metricset)
    {
        $this->metricsets[] = $metricset;
    }

    /**
     * @return Metadata|null
     */
    public function getMetadata(): ?Metadata
    {
        return $this->metadata;
    }

    /**
     * @param Metadata $metadata
     */
    public function setMetadata(Metadata $metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * @return Register
     */
    public static function instance(): Register
    {
        self::$instance = self::$instance ?: new self;

        return self::$instance;
    }
}