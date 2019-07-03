<?php

namespace Bilyiv\Elastic\Apm\Client;

use Bilyiv\Elastic\Apm\Client\Entity\Agent;
use Bilyiv\Elastic\Apm\Client\Entity\Metadata;
use Bilyiv\Elastic\Apm\Client\Entity\Service;
use Bilyiv\Elastic\Apm\Client\Entity\Trace;
use Bilyiv\Elastic\Apm\Client\Entity\Transaction;

/**
 * @author Vladyslav Bilyi <vladyslav.bilyi@gmail.com>
 */
class Manager
{
    /**
     * @var Trace
     */
    private static $trace;

    /**
     * Starts a new transaction.
     *
     * @param string $name
     * @param null|string $type
     *
     * @return Transaction
     */
    public static function startTransaction(string $name, ?string $type = 'request'): Transaction
    {
        $transaction = (new Transaction())
            ->setName($name)
            ->setType($type)
            ->setTrace(self::getTrace());

        return $transaction;
    }

    /**
     * Ends already started transaction.
     *
     * @param Transaction $transaction
     * @param string $result
     */
    public static function endTransaction(Transaction $transaction, string $result)
    {
        $duration = time() - $transaction->getCreatedAt();

        $transaction
            ->setResult($result)
            ->setDuration($duration);

        Register::instance()->addTransaction($transaction);
    }

    /**
     * @param string $service
     * @param string $environment
     *
     * @return Metadata
     */
    public static function getMetadata(string $service, ?string $environment = null): Metadata
    {
        $agent = new Agent(Client::$name, Client::$version);

        $service = new Service($service, $environment);
        $service->setAgent($agent);

        return new Metadata($service);
    }

    /**
     * @return Trace
     */
    private static function getTrace(): Trace
    {
        self::$trace = self::$trace ?: new Trace();

        return self::$trace;
    }
}