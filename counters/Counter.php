<?php

namespace app\counters;

interface Counter
{
    /**
     * Calculates custom count
     */
    public function calculateCount();
}