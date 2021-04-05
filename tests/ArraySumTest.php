<?php

use App\ArraySum;
use PHPUnit\Framework\TestCase;

class ArraySumTest extends TestCase
{
    /** @test */
    public function it_returns_zero_if_empty_array()
    {
        $this->assertEquals(0, ArraySum::instance()->sum([]));
    }

    /** @test */
    public function it_counts_properly()
    {
        $this->assertEquals(4, ArraySum::instance()->sum([4]));
        $this->assertEquals(5, ArraySum::instance()->sum([1,4]));
        $this->assertEquals(11, ArraySum::instance()->sum([4,4,2,1]));
        $this->assertEquals(28, ArraySum::instance()->sum([1,5,3,4,2,6,7]));
    }
}