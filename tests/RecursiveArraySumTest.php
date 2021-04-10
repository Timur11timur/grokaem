<?php

use App\RecursiveArraySum;
use PHPUnit\Framework\TestCase;

class RecursiveArraySumTest extends TestCase
{
    /** @test */
    public function it_returns_zero_if_empty_array()
    {
        $this->assertEquals(0, RecursiveArraySum::instance()->sum([]));
    }

    /** @test */
    public function it_counts_properly()
    {
        $this->assertEquals(4, RecursiveArraySum::instance()->sum([4]));
        $this->assertEquals(5, RecursiveArraySum::instance()->sum([1,4]));
        $this->assertEquals(11, RecursiveArraySum::instance()->sum([4,4,2,1]));
        $this->assertEquals(28, RecursiveArraySum::instance()->sum([1,5,3,4,2,6,7]));
    }
}