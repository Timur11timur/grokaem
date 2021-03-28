<?php

use App\SelectionSorting;
use PHPUnit\Framework\TestCase;

class SelectionSortingTest extends TestCase
{
    /** @test */
    public function it_sorts_array_without_elements()
    {
        $array = [];

        $sorting = new SelectionSorting('min');

        $this->assertEquals($array, $sorting->sort($array));
    }

    /** @test */
    public function it_sorts_array_with_one_element()
    {
        $array = [5];

        $sorting = new SelectionSorting('min');

        $this->assertEquals($array, $sorting->sort($array));
    }

    /** @test */
    public function it_sorts_array_with_two_element()
    {
        $array = [5, 1];

        $sorting = new SelectionSorting('min');

        $this->assertEquals([1, 5], $sorting->sort($array));

        $sortingMax = new SelectionSorting('max');

        $this->assertEquals($array, $sortingMax->sort($array));
    }

    /** @test */
    public function it_sorts_array_with_three_element()
    {
        $array = [5, 8, 3];

        $sorting = new SelectionSorting('min');

        $this->assertEquals([3, 5, 8], $sorting->sort($array));

        $sortingMax = new SelectionSorting('max');

        $this->assertEquals([8, 5, 3], $sortingMax->sort($array));
    }

    /** @test */
    public function it_throws_error_if_wrong_order()
    {
        $this->expectException(\Exception::class);

        new SelectionSorting('aaa');
    }
}
