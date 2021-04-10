<?php

namespace App;

class RecursiveCount
{
    private array $list;
    private int $quantity = 0;

    public function __construct(array $list)
    {
        $this->list = $list;
    }

    public function count(): int
    {
        if (isset($this->list[0])) {
            $this->quantity++;
            array_shift($this->list);

            return $this->count();
        } else {
            return $this->quantity;
        }
    }

}