<?php

namespace app\ranges;

use app\validators\Validator;
use Generator;

abstract class Range
{
    /**
     * @var Bounds $bounds
     */
    protected $bounds;

    /**
     * @var Validator $validator
     */
    protected $validator;

    /**
     * Range constructor.
     * @param Bounds $bounds
     */
    public function __construct(Bounds $bounds)
    {
        $this->bounds = $bounds;
        $this->initValidator();
    }

    /**
     * @return Generator
     */
    public abstract function generateRange() : Generator;

    /**
     * Method requires to initialize data validation middleware
     */
    protected abstract function initValidator();
}