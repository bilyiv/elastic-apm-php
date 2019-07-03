<?php

namespace Bilyiv\Elastic\Apm\Client\Entity;

use Bilyiv\Elastic\Apm\Client\IdGenerator;

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
        $this->id = IdGenerator::generate(32);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}

