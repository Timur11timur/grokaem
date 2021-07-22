<?php

namespace App;

class DynamicComparison
{
    private string $seek;

    private array $array;

    private array $result = [];

    private int $maxScore = 0;

    public function __constructor(string $seek, $array)
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
        return $this->maxScore;
    }

    public function getBestResult(): string
    {

    }

    public function getBestResults(): array
    {

    }

    private function calculate()
    {
        for ($i = 0; $i < count($this->array); $i++) {
            $word = mb_strtolower($this->array[$i]);
            for ($j = 0; $j < count($this->seek); $j++) {
                for ($k = 0; $k < count($word); $k++) {
                    $this->result[$word][$j][$k] = 0;
                    if ($this->seek[$j] == $word[$k]) {
                        if (($j !== 0) && ($k !== 0) && ($this->result[$word][$j-1][$k-1] !== 0)) {
                            $this->result[$word][$j][$k] = $this->result[$word][$j-1][$k-1] + 1;
                            if ($this->maxScore < $this->result[$word][$j][$k]) {
                                $this->maxScore = $this->result[$word][$j][$k];
                            }
                        } else {
                            $this->result[$word][$j][$k] = 1;
                        }
                    }
                }
            }
        }
    }
}