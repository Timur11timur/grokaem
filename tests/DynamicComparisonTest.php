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
        $this->assertSame(['a'], $compare->getBestResults());
    }
}
