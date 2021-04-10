<?php

namespace App;

class RecursiveArrayMaxElement
{
    private int $max;
    private array $array;
    private int $position = 0;

    public function __construct(array $array)
    {
        if (!count($array)) {
            throw new \Exception('Array has no elements');
        }
        $this->max = $array[0];
        $this->array = $array;
    }

    public function getMax()
    {
        if (!isset($this->array[$this->position])) {
            return $this->max;
        } else {
            $current = $this->array[$this->position];
            if (!is_integer($current)) {
                throw new \Exception('Only integer is comparable');
            }
            if ($current > $this->max) {
                $this->max = $current;
            }
            $this->position ++;
            return $this->getMax();
        }

    }
}