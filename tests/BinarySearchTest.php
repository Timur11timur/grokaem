<?php

use App\BinarySearch;
use PHPUnit\Framework\TestCase;

class BinarySearchTest extends TestCase
{
    /** @test */
    public function it_finds()
    {
        $list = ['el'];

        $search = new BinarySearch($list);

        $this->assertSame(1, $search->find('el'));
    }

    /** @test */
    public function it_returns_zero_if_not_found()
    {
        $list = ['el'];

        $search = new BinarySearch($list);

        $this->assertSame(0, $search->find('some'));
    }

    /** @test */
    public function it_returns_trace()
    {
        $list = ['el', 'el 2', 'el 3'];

        $search = new BinarySearch($list);
        $search->find('el');

        $this->assertEquals([2, 1], $search->trace());
    }

    /** @test */
    public function it_returns_steps()
    {
        $list = ['el', 'el 2', 'el 3'];

        $search = new BinarySearch($list);
        $search->find('el');

        $this->assertSame(2, $search->steps());
    }
}
