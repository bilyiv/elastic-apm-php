<?php

namespace Bilyiv\Elastic\Apm\Client;

use Bilyiv\Elastic\Apm\Client\Scheme\Error;
use Bilyiv\Elastic\Apm\Client\Scheme\Metadata;
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
     * @param Transaction $transaction
     *
     * @return string
     */
    public function encodeTransaction(Transaction $transaction): string
    {
        return json_encode(['transaction' => $this->encode($transaction)]) . PHP_EOL;
    }

    /**
     * @param Error $error
     *
     * @return string
     */
    public function encodeError(Error $error): string
    {
        return json_encode(['error' => $this->encode($error)]) . PHP_EOL;
    }

    /**
     * @param Metadata $metadata
     *
     * @return string
     */
    public function encodeMetadata(Metadata $metadata): string
    {
        return json_encode(['metadata' => $this->encode($metadata)]) . PHP_EOL;
    }

    /**
     * @param EncodableInterface $encodable
     *
     * @return array
     */
    public function encode(EncodableInterface $encodable): array
    {
        return $encodable->toArray();
    }
}