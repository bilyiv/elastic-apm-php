<?php

namespace Bilyiv\Elastic\Apm\Client;

use Bilyiv\Elastic\Apm\Client\Scheme\Error;
use Bilyiv\Elastic\Apm\Client\Scheme\Metadata;
use Bilyiv\Elastic\Apm\Client\Scheme\Metricset;
use Bilyiv\Elastic\Apm\Client\Scheme\Transaction;

/**
 * @author Vladyslav Bilyi <vladyslav.bilyi@gmail.com>
 */
class Encoder
{
    /**
     * @param array|Transaction[] $transactions
     *
     * @return null|string
     */
    public function encodeTransactions(array $transactions): ?string
    {
        $result = null;

        foreach ($transactions as $transaction) {
            $result .= $this->encodeTransaction($transaction);
        }

        return $result;
    }

    /**
     * @param array|Error[] $errors
     *
     * @return null|string
     */
    public function encodeErrors(array $errors): ?string
    {
        $result = null;

        foreach ($errors as $error) {
            $result .= $this->encodeError($error);
        }

        return $result;
    }

    /**
     * @param array|Metricset[] $metricsets
     *
     * @return null|string
     */
    public function encodeMetricsets(array $metricsets): ?string
    {
        $result = null;

        foreach ($metricsets as $metricset) {
            $result .= $this->encodeMetricset($metricset);
        }

        return $result;
    }

    /**
     * @param Transaction $transaction
     *
     * @return string
     */
    public function encodeTransaction(Transaction $transaction): string
    {
        return $this->encode('transaction', $transaction);
    }

    /**
     * @param Error $error
     *
     * @return string
     */
    public function encodeError(Error $error): string
    {
        return $this->encode('error', $error);
    }

    /**
     * @param Metricset $metricset
     *
     * @return string
     */
    public function encodeMetricset(Metricset $metricset): string
    {
        return $this->encode('metricset', $metricset);
    }

    /**
     * @param Metadata $metadata
     *
     * @return string
     */
    public function encodeMetadata(Metadata $metadata): string
    {
        return $this->encode('metadata', $metadata);
    }

    /**
     * @param string $key
     * @param EncodableInterface $encodable
     *
     * @return string
     */
    public function encode(string $key, EncodableInterface $encodable): string
    {
        return json_encode([$key => $encodable->toArray()]) . PHP_EOL;
    }
}