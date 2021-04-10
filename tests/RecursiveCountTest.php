<?php

use App\RecursiveCount;
use PHPUnit\Framework\TestCase;

class RecursiveCountTest extends TestCase
{
    /** @test */
    public function it_returns_zero_if_not_elements()
    {
        $list = [];

        $count = new RecursiveCount($list);

        $this->assertSame(0, $count->count());
    }

    /** @test */
    public function it_returns_one_if_one_element()
    {
        $list = ['el'];

        $count = new RecursiveCount($list);

        $this->assertEquals(1, $count->count());
    }

    /** @test */
    public function it_returns_count()
    {
        $list = ['el', 'el 2', 'el 3', 'el 4', 'el 5'];

        $count = new RecursiveCount($list);

        $this->assertSame(5, $count->count());
    }

    /** @test */
    public function it_counts_if_different_formats()
    {
        $list = ['el', [], 34, true];

        $count = new RecursiveCount($list);

        $this->assertEquals(4, $count->count());
    }
}
