<?php

use App\Factorial;
use PHPUnit\Framework\TestCase;

class FactorialTest extends TestCase
{
    /** @test */
    public function it_accepts_only_numbers()
    {
        $this->expectException(\Exception::class);

        $result = Factorial::instance()->count('string');
    }

    /** @test */
    public function it_accepts_positive_numbers()
    {
        $this->expectException(\Exception::class);

        $result = Factorial::instance()->count(-1);
    }

    /** @test */
    public function it_counts_factorial_of_zero()
    {
        $this->assertEquals(1, Factorial::instance()->count(0));

    }

    /** @test */
    public function it_counts_factorial_properly()
    {
        $this->assertEquals(1, Factorial::instance()->count(1));
        $this->assertEquals(2, Factorial::instance()->count(2));
        $this->assertEquals(6, Factorial::instance()->count(3));
        $this->assertEquals(24, Factorial::instance()->count(4));
        $this->assertEquals(120, Factorial::instance()->count(5));
    }
}