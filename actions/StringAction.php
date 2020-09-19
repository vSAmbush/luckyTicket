<?php

namespace app\actions;

abstract class StringAction
{
    /**
     * @param string $string
     * @return integer
     */
    public abstract function action($string);
}