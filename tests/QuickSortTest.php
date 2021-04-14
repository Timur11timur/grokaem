<?php

use App\QuickSort;
use PHPUnit\Framework\TestCase;

class QuickSortTest extends TestCase
{
    /** @test */
    public function it_accepts_only_array()
    {
        $this->expectException(\Exception::class);

        $result = QuickSort::instance()->sort('string');

        $this->expectException(\Exception::class);

        $result = QuickSort::instance()->sort(44);

        $this->expectException(\Exception::class);

        $result = QuickSort::instance()->sort(false);
    }

    /** @test */
    public function it_accepts_empty_array()
    {
        $this->assertEquals([], QuickSort::instance()->sort([]));
    }

    /** @test */
    public function it_accepts_array_with_one_argument()
    {
        $this->assertEquals([5], QuickSort::instance()->sort([5]));
    }

    /** @test */
    public function it_sorts()
    {
        $this->assertEquals([1, 5], QuickSort::instance()->sort([5, 1]));
        $this->assertEquals([2, 3], QuickSort::instance()->sort([2, 3]));
        $this->assertEquals([1, 2, 3], QuickSort::instance()->sort([2, 3, 1]));
        $this->assertEquals([1, 2, 3, 4, 5], QuickSort::instance()->sort([5, 1, 3, 4, 2]));
        $this->assertEquals(['aa', 'bb', 'cc'], QuickSort::instance()->sort(['cc', 'aa', 'bb']));
        $this->assertEquals([0, 2, 4, 6, 8, 10, 12], QuickSort::instance()->sort([12, 0, 2, 6, 8, 4, 10]));
    }
}