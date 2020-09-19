<?php

namespace app\validators;

use app\exceptions\DataValidationException;
use app\ranges\Bounds;

class IsDigitalValidator extends Validator
{
    /**
     * @inheritDoc
     */
    public function check(Bounds $bounds): bool {
        $pattern = '/^\d+$/';

        if (preg_match($pattern, $bounds->getFrom()) && preg_match($pattern, $bounds->getTo())) {
            return parent::check($bounds);
        }

        throw new DataValidationException('Passed parameters must be digital!');
    }
}