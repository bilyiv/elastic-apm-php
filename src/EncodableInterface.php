<?php

namespace Bilyiv\Elastic\Apm\Client;

/**
 * @author Vladyslav Bilyi <vladyslav.bilyi@gmail.com>
 */
interface EncodableInterface
{
    /**
     * @return array
     */
    public function toArray(): array;
}