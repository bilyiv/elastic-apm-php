<?php

namespace Bilyiv\Elastic\Apm\Client;

/**
 * @author Vladyslav Bilyi <vladyslav.bilyi@gmail.com>
 */
interface RequestInterface
{
    public function getTransactions();
}