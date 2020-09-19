<?php

namespace app\validators;

use app\exceptions\DataValidationException;
use app\ranges\Bounds;

class StringCompareValidator extends Validator
{
    /**
     * @inheritDoc
     */
    public function check(Bounds $bounds): bool {
        if (strlen($bounds->getFrom()) <= strlen($bounds->getTo())) {
            return parent::check($bounds);
        }

        throw new DataValidationException('Bound "to" must be greater than "from"!');
    }
}