<?php

namespace Bilyiv\Elastic\Apm\Client;

/**
 * @author Vladyslav Bilyi <vladyslav.bilyi@gmail.com>
 */
class Generator
{
    /**
     * @param int $length
     *
     * @return string
     * @throws \Exception
     */
    public static function id(int $length = 16): string
    {
        return bin2hex(random_bytes($length/2));
    }
}