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

    /** @test */
    public function it_works_four()
    {
        //For usage you have to describe whole elements
        $elements = [];

        $elements['Start'] = [
            ['name' => 'A', 'amount' => 6],
            ['name' => 'B', 'amount' => 2],
        ];

        $elements['A'] = [
            ['name' => 'Fin', 'amount' => 1],
        ];

        $elements['B'] = [
            ['name' => 'A', 'amount' => 3],
            ['name' => 'Fin', 'amount' => 5],
        ];

        $elements['Fin'] = [];

        $result = new Deikstra($elements);

        $this->assertEquals(6, $result->getAmount());
        $this->assertSame(['Start', 'B', 'A', 'Fin'], $result->getRoute());
    }

    /** @test */
    public function it_works_A()
    {
        //For usage you have to describe whole elements
        $elements = [];

        $elements['Start'] = [
            ['name' => 'A', 'amount' => 5],
            ['name' => 'C', 'amount' => 2],
        ];

        $elements['A'] = [
            ['name' => 'B', 'amount' => 4],
            ['name' => 'D', 'amount' => 2],
        ];

        $elements['C'] = [
            ['name' => 'A', 'amount' => 8],
            ['name' => 'D', 'amount' => 7],
        ];

        $elements['B'] = [
            ['name' => 'D', 'amount' => 6],
            ['name' => 'Fin', 'amount' => 3],
        ];

        $elements['D'] = [
            ['name' => 'Fin', 'amount' => 1],
        ];

        $elements['Fin'] = [];

        $result = new Deikstra($elements);

        $this->assertEquals(8, $result->getAmount());
        $this->assertSame(['Start', 'A', 'D', 'Fin'], $result->getRoute());
    }

    /** @test */
    public function it_works_B()
    {
        //For usage you have to describe whole elements
        $elements = [];

        $elements['Start'] = [
            ['name' => 'A', 'amount' => 10],
        ];

        $elements['A'] = [
            ['name' => 'B', 'amount' => 20],
        ];

        $elements['B'] = [
            ['name' => 'C', 'amount' => 1],
            ['name' => 'Fin', 'amount' => 30],
        ];

        $elements['C'] = [
            ['name' => 'A', 'amount' => 1],
        ];

        $elements['Fin'] = [];

        $result = new Deikstra($elements);

        $this->assertEquals(60, $result->getAmount());
        $this->assertSame(['Start', 'A', 'B', 'Fin'], $result->getRoute());
    }

    /** @test */
    public function it_works_C()
    {
        //For usage you have to describe whole elements
        $elements = [];

        $elements['Start'] = [
            ['name' => 'A', 'amount' => 2],
            ['name' => 'B', 'amount' => 2],
        ];

        $elements['A'] = [
            ['name' => 'Fin', 'amount' => 2],
            ['name' => 'C', 'amount' => 2],
        ];

        $elements['B'] = [
            ['name' => 'A', 'amount' => 2],
        ];

        $elements['C'] = [
            ['name' => 'Fin', 'amount' => 2],
            ['name' => 'B', 'amount' => -1],
        ];

        $elements['Fin'] = [];

        $result = new Deikstra($elements);

        $this->assertEquals(4, $result->getAmount());
        $this->assertSame(['Start', 'A', 'Fin'], $result->getRoute());
    }
}
