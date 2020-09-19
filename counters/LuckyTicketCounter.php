<?php

namespace app\counters;

use app\actions\StringAction;
use app\ranges\Range;

class LuckyTicketCounter implements Counter
{
    /**
     * @var integer $count
     */
    protected $count;

    /**
     * @var Range $range
     */
    protected $range;

    /**
     * @var StringAction $action
     */
    protected $action;

    /**
     * LuckyTicketCounter constructor.
     * @param Range $range
     * @param StringAction $action
     * @param bool $calculateImmediately
     */
    public function __construct(Range $range, StringAction $action, $calculateImmediately = true)
    {
        $this->count = 0;
        $this->range = $range;
        $this->action = $action;

        if ($calculateImmediately) {
            $this->calculateCount();
        }
    }

    public function calculateCount()
    {
        foreach ($this->range->generateRange() as $string) {
            $len = strlen($string);
            $first = substr($string, 0, $len / 2);
            $second = substr($string, $len / 2, $len);

            if ($this->action->action($first) === $this->action->action($second)) {
                $this->count++;
            }
        }
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }
}