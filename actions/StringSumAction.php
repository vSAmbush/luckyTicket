<?php

namespace app\actions;

class StringSumAction extends StringAction
{
    /**
     * @inheritDoc
     */
    public function action($string)
    {
        $sum = array_sum(str_split($string));

        if (strlen((string)$sum) > 1) {
            return $this->action($sum);
        } else {
            return $sum;
        }
    }
}