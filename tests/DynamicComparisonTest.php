<?php

use App\DynamicComparison;
use PHPUnit\Framework\TestCase;

class DynamicComparisonTest extends TestCase
{
    /** @test */
    public function it_compares()
    {
        $compare = new DynamicComparison('a', 'a');

        $this->assertSame(1, $compare->getMaxScores());
        $this->assertSame('a', $compare->getBestResult());
    }

    /** @test */
    public function it_compares_with_several()
    {
        $compare = new DynamicComparison('abc', ['abf', 'avc', 'sbv']);

        $this->assertSame(2, $compare->getMaxScores());
        $this->assertSame('abf', $compare->getBestResult());
    }

    /** @test */
    public function it_compares_with_different_length()
    {
        $compare = new DynamicComparison('abcd', ['sdabcd', 'abcsdjki']);

        $this->assertSame(4, $compare->getMaxScores());
        $this->assertSame('sdabcd', $compare->getBestResult());
    }

    /** @test */
    public function it_compares_with_gap()
    {
        $compare = new DynamicComparison('first name', ['firs', 'rst name', 'namedfasfasdf']);

        $this->assertSame(8, $compare->getMaxScores());
        $this->assertSame('rst name', $compare->getBestResult());
    }
}
