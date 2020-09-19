<?php

namespace app\validators;

use app\exceptions\DataValidationException;
use app\ranges\Bounds;

class Validator
{
    /**
     * @var Validator $next
     */
    private $next;

    /**
     * @param Validator $next
     * @return Validator
     */
    public function setNext(Validator $next): Validator
    {
        $this->next = $next;

        return $this;
    }

    /**
     * @param Bounds $bounds
     * @return bool
     * @throws DataValidationException
     */
    public function check(Bounds $bounds): bool {
        if (!$this->next) {
            return true;
        }

        return $this->next->check($bounds);
    }
}