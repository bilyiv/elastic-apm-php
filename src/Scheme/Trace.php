<?php

namespace Bilyiv\Elastic\Apm\Client\Scheme;

use Bilyiv\Elastic\Apm\Client\Generator;

/**
 * @author Vladyslav Bilyi <vladyslav.bilyi@gmail.com>
 */
class Trace
{
    /**
     * @var string
     */
    private $id;

    public function __construct()
    {
        $this->id = Generator::id(32);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}

