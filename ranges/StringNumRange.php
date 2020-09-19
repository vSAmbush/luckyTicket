<?php

namespace app\ranges;

use app\validators\IsDigitalValidator;
use app\validators\StringCompareValidator;
use app\validators\StringLengthValidator;
use Generator;

class StringNumRange extends Range
{
    const MAX_STRING_LENGTH = 6;
    const MIN_STRING_LENGTH = 1;

    /**
     * @inheritDoc
     */
    public function generateRange(): Generator
    {
        if ($this->validator->check($this->bounds)) {
            foreach (range($this->bounds->getFrom(), $this->bounds->getTo()) as $i) {
                yield str_pad((string)$i, self::MAX_STRING_LENGTH, '0', STR_PAD_LEFT);
            }
        }
    }

    /**
     * @inheritDoc
     */
    protected function initValidator()
    {
        $this->validator = new StringLengthValidator();
        $this->validator
            ->setNext((new IsDigitalValidator())->setNext(new StringCompareValidator()));
    }
}