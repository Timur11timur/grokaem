<?php

use App\Graph\Deikstra;
use PHPUnit\Framework\TestCase;

class DeikstraTest extends TestCase
{
    /** @test */
    public function it_works()
    {
        //For usage you have to describe whole elements
        $elements = [];

        $elements['kniga'] = [
            ['name' => 'plastinka', 'amount' => 5],
            ['name' => 'poster', 'amount' => 0],
        ];

        $elements['plastinka'] = [
            ['name' => 'gitara', 'amount' => 15],
            ['name' => 'baraban', 'amount' => 20],
        ];

        $elements['poster'] = [
            ['name' => 'gitara', 'amount' => 30],
            ['name' => 'baraban', 'amount' => 35],
        ];

        $elements['gitara'] = [
            ['name' => 'pionino', 'amount' => 20],
        ];

        $elements['baraban'] = [
            ['name' => 'pionino', 'amount' => 10],
        ];

        $elements['pionino'] = [];

        $result = new Deikstra($elements);

        $this->assertEquals(35, $result->getAmount());
        $this->assertSame(['kniga', 'plastinka', 'baraban', 'pionino'], $result->getRoute());
    }

    /** @test */
    public function it_works_second()
    {
        //For usage you have to describe whole elements
        $elements = [];

        $elements['A'] = [
            ['name' => 'B', 'amount' => 4],
            ['name' => 'C', 'amount' => 8],
            ['name' => 'D', 'amount' => 9],
        ];

        $elements['B'] = [
            ['name' => 'C', 'amount' => 3],
            ['name' => 'E', 'amount' => 5],
        ];

        $elements['C'] = [
            ['name' => 'F', 'amount' => 2],
        ];

        $elements['D'] = [
            ['name' => 'F', 'amount' => 10],
        ];

        $elements['E'] = [
            ['name' => 'F', 'amount' => 6],
        ];

        $elements['F'] = [
            ['name' => 'H', 'amount' => 1],
        ];

        $elements['H'] = [];

        $result = new Deikstra($elements);

        $this->assertEquals(10, $result->getAmount());
        $this->assertSame(['A', 'B', 'C', 'F', 'H'], $result->getRoute());
    }

    /** @test */
    public function it_works_third()
    {
        //For usage you have to describe whole elements
        $elements = [];

        $elements['AA'] = [
            ['name' => 'BB', 'amount' => 1],
            ['name' => 'CC', 'amount' => 5],
        ];

        $elements['BB'] = [
            ['name' => 'CC', 'amount' => 4],
            ['name' => 'DD', 'amount' => 1],
        ];

        $elements['CC'] = [
            ['name' => 'EE', 'amount' => 6],
        ];

        $elements['DD'] = [
            ['name' => 'CC', 'amount' => 1],
            ['name' => 'FF', 'amount' => 10],
        ];

        $elements['EE'] = [
            ['name' => 'FF', 'amount' => 2],
        ];

        $elements['FF'] = [];

        $result = new Deikstra($elements);

        $this->assertEquals(11, $result->getAmount());
        $this->assertSame(['AA', 'BB', 'DD', 'CC', 'EE', 'FF'], $result->getRoute());
    }
}
