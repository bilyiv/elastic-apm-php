<?php

namespace Bilyiv\Elastic\Apm\Client;

use Bilyiv\Elastic\Apm\Client\Entity\Metadata;
use Bilyiv\Elastic\Apm\Client\Entity\Transaction;

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
     * @param Transaction $transaction
     *
     * @return string
     */
    public function encodeTransaction(Transaction $transaction): string
    {
        return json_encode($transaction->toArray()) . PHP_EOL;
    }

    /**
     * @param Metadata $metadata
     *
     * @return string
     */
    public function encodeMetadata(Metadata $metadata): string
    {
        return json_encode($metadata->toArray()) . PHP_EOL;
    }
}