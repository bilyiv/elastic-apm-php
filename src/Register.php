<?php

namespace Bilyiv\Elastic\Apm\Client;

use Bilyiv\Elastic\Apm\Client\Entity\Error;
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
     * @var array
     */
    private $errors = [];

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
     * @return Register
     */
    public static function instance(): Register
    {
        self::$instance = self::$instance ?: new self;

        return self::$instance;
    }
}