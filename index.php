<?php
    require_once "vendor/autoload.php";

    if (isset($_GET['first']) && isset($_GET['end'])) {
        $range = new \app\ranges\StringNumRange(new \app\ranges\Bounds($_GET['first'], $_GET['end']));
        $counter = new \app\counters\LuckyTicketCounter($range, new \app\actions\StringSumAction());

        echo $counter->getCount();
    }