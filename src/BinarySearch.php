<?php

namespace App;

use phpDocumentor\Reflection\Types\Mixed_;

class BinarySearch
{
    private int $low = 0;
    private int $high;
    private array $list;
    private array $trace = [];

    public function __construct(array $list)
    {
        $this->high = count($list) - 1;
        $this->list = $list;
    }

    public function find($el): int
    {
        do {
            $current = floor(($this->low + $this->high) / 2);

            if ( $this->list[$current] === $el) {
                $this->trace[] = (int) $current + 1;
                return $current + 1;
            } elseif($this->list[$current] < $el) {
                $this->trace[] = (int) $current + 1;
                $this->low = $current;
            } else {
                $this->trace[] = (int) $current + 1;
                $this->high = $current;
            }

        } while ($this->low !== $this->high);

        return 0;
    }

    public function trace(): array
    {
        return $this->trace;
    }

    public function steps(): int
    {
        return count($this->trace);
    }

}