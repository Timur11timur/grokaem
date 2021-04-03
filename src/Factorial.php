<?php

namespace App;

class Factorial
{
    private int $result = 1;

    public function count($value)
    {
        if (gettype($value) != "integer") {
            throw new \Exception("Wrong data type!");
        }

        if ($value < 0) {
            throw new \Exception("Number have to be positive!");
        }

        if ($value == 0) {
            return $this->result;
        }

        $this->result = $this->result * $value;

        return $this->count($value - 1);
    }

    public static function instance()
    {
        return new static();
    }
}