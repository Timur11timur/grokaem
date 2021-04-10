<?php

namespace App;

class RecursiveArraySum
{
    private int $result = 0;

    public function sum(array $array)
    {
        if (!count($array)) {
            return $this->result;
        }

        $this->result += $array[0];

        return $this->sum(array_slice($array, 1));
    }

    public static function instance()
    {
        return new static();
    }
}