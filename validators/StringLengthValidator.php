<?php

namespace app\validators;

use app\exceptions\DataValidationException;
use app\ranges\Bounds;
use app\ranges\StringNumRange;

class StringLengthValidator extends Validator
{
    /**
     * @inheritDoc
     */
    public function check(Bounds $bounds): bool {
        if (strlen($bounds->getFrom()) <= StringNumRange::MAX_STRING_LENGTH && strlen($bounds->getTo()) <= StringNumRange::MAX_STRING_LENGTH
            && strlen($bounds->getFrom()) >= StringNumRange::MIN_STRING_LENGTH && strlen($bounds->getTo()) >= StringNumRange::MIN_STRING_LENGTH) {
            return parent::check($bounds);
        }

        throw new DataValidationException('Passed parameters must be more than ' . StringNumRange::MIN_STRING_LENGTH . ' character and less than ' . StringNumRange::MAX_STRING_LENGTH);
    }
}