<?php

namespace Bilyiv\Elastic\Apm\Client;

use Bilyiv\Elastic\Apm\Client\Entity\Transaction;

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
     * @return Register
     */
    public static function instance(): Register
    {
        self::$instance = self::$instance ?: new self;

        return self::$instance;
    }
}