<?php

use app\actions\StringSumAction;
use app\exceptions\DataValidationException;
use PHPUnit\Framework\TestCase;

class LuckyTicketTest extends TestCase
{
    public function testSumAction()
    {
        $this->assertEquals(6, (new StringSumAction())->action('456'));
        $this->assertEquals(3, (new StringSumAction())->action('111'));
    }

    public function testNonDigitalException()
    {
        $this->expectException(DataValidationException::class);

        $range = new \app\ranges\StringNumRange(new \app\ranges\Bounds('123456', '12345~'));
        foreach ($range->generateRange() as $item) {
            var_dump($item);
        }
    }

    public function testStringLengthException()
    {
        $this->expectException(DataValidationException::class);

        $range = new \app\ranges\StringNumRange(new \app\ranges\Bounds('', '1234567'));
        foreach ($range->generateRange() as $item) {
            var_dump($item);
        }
    }

    public function testStringCompareException()
    {
        $this->expectException(DataValidationException::class);

        $range = new \app\ranges\StringNumRange(new \app\ranges\Bounds('123456', '12345'));
        foreach ($range->generateRange() as $item) {
            var_dump($item);
        }
    }

    public function testSuccessProcess()
    {
        $range = new \app\ranges\StringNumRange(new \app\ranges\Bounds('123456', '123456'));
        $counter = new \app\counters\LuckyTicketCounter($range, new \app\actions\StringSumAction());

        $this->assertEquals(1, $counter->getCount());
    }
}