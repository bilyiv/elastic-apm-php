<?php

namespace Bilyiv\Elastic\Apm\Client\Entity;

use Bilyiv\IdGenerator;

/**
 * @author Vladyslav Bilyi <vladyslav.bilyi@gmail.com>
 */
class Span
{
    /**
     * @var string
     */
    private $id;

    public function __construct()
    {
        $this->id = IdGenerator::generate();
    }
}