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

    /** @test */
    public function proper_data_if_7()
    {
        $list = ['el 1', 'el 2', 'el 3', 'el 4', 'el 5', 'el 6', 'el 7'];

        $search = new BinarySearch($list);

        $this->assertSame(3, $search->find('el 3'));
        $this->assertEquals([4, 2, 3], $search->trace());
        $this->assertSame(3, $search->steps());
    }

    /** @test */
    public function proper_data_if_8()
    {
        $list = ['el 1', 'el 2', 'el 3', 'el 4', 'el 5', 'el 6', 'el 7', 'el 8'];

        $search = new BinarySearch($list);

        $this->assertSame(5, $search->find('el 5'));
        $this->assertEquals([4, 6, 5], $search->trace());
        $this->assertSame(3, $search->steps());
    }

    /** @test */
    public function proper_data()
    {
        $list = [];
        for ($i = 0; $i < 100; $i++) {
            $list[] = 'el ' . ($i + 1);
        }

        $search = new BinarySearch($list);

        $this->assertSame(49, $search->find('el 49'));
        $this->assertEquals([50, 25, 37, 43, 46, 48, 49], $search->trace());
        $this->assertSame(7, $search->steps());
    }

    /** @test */
    public function steps_for_128_el()
    {
        $list = [];
        for ($i = 1; $i <= 128; $i++) {
            $list[] = 'el ' . $i;
        }

        sort($list);

        $search = new BinarySearch($list);

        $search->find('el 128');
        $this->assertSame(7, $search->steps());

        $search = new BinarySearch($list);

        $search->find('el 1');
        $this->assertSame(7, $search->steps());
    }

    /** @test */
    public function steps_for_128_figures()
    {
        $list = [];
        for ($i = 1; $i <= 128; $i++) {
            $list[] = $i;
        }

        $search = new BinarySearch($list);

        $this->assertSame(127, $search->find(127));
        $this->assertEquals([64, 96, 112, 120, 124, 126, 127], $search->trace());
        $this->assertSame(7, $search->steps());

        $search = new BinarySearch($list);

        $this->assertSame(128, $search->find(128));
        $this->assertEquals([64, 96, 112, 120, 124, 126, 127, 128], $search->trace());
        $this->assertSame(8, $search->steps());
    }
}
