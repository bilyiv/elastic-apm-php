<?php

namespace Bilyiv\Elastic\Apm\Client;

/**
 * @author Vladyslav Bilyi <vladyslav.bilyi@gmail.com>
 */
class IdGenerator
{
    /**
     * @param int $length
     *
     * @return string
     * @throws \Exception
     */
    public static function generate(int $length = 16): string
    {
        return bin2hex(random_bytes($length/2));
    }
}