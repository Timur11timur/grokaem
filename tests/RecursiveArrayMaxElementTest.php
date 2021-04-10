<?php

use App\RecursiveArrayMaxElement;
use PHPUnit\Framework\TestCase;

class RecursiveArrayMaxElementTest extends TestCase
{
    /** @test */
    public function it_does_not_accept_empty_array()
    {
        $array = [];
        $this->expectException(\Exception::class);
        new RecursiveArrayMaxElement($array);
    }

    /** @test */
    public function it_returns_max()
    {
        $array = [1,5,3,7,2];
        $max = new RecursiveArrayMaxElement($array);
        $this->assertEquals(7, $max->getMax());
    }

    /** @test */
    public function it_accepts_only_integer()
    {
        $array = [3, true, 8];
        $this->expectException(\Exception::class);
        $max = new RecursiveArrayMaxElement($array);
        $max->getMax();
    }
}