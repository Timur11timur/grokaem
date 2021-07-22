<?php

namespace App;

class DynamicComparison
{
    private string $seek;

    private array $array;

    private array $result = [];

    private array $best = ['maxScore' => 0, 'name' => ''];

    public function __construct(string $seek, $array)
    {
        $this->seek = mb_strtolower($seek);
        if (is_array($array)) {
            $this->array = $array;
        } else {
            $this->array = [$array];
        }
        $this->calculate();
    }

    public function getMaxScores(): int
    {
        return $this->best['maxScore'];
    }

    public function getBestResult(): string
    {
        return $this->best['name'];
    }

    private function calculate()
    {
        for ($i = 0; $i < count($this->array); $i++) {
            $word = mb_strtolower($this->array[$i]);
            for ($j = 0; $j < mb_strlen($this->seek); $j++) {
                for ($k = 0; $k < mb_strlen($word); $k++) {
                    $this->result[$word][$j][$k] = 0;
                    if ($this->seek[$j] == $word[$k]) {
                        if (($j !== 0) && ($k !== 0) && ($this->result[$word][$j-1][$k-1] !== 0)) {
                            $this->result[$word][$j][$k] = $this->result[$word][$j-1][$k-1] + 1;
                        } else {
                            $this->result[$word][$j][$k] = 1;
                        }
                        if ($this->best['maxScore'] < $this->result[$word][$j][$k]) {
                            $this->best['maxScore'] = $this->result[$word][$j][$k];
                            $this->best['name'] = $word;

                        }
                    }
                }
            }
        }
    }
}