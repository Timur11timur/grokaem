<?php

namespace App;

class BinarySearch
{
    private int $lowElement = 1;
    private int $highElement;
    private array $list;
    private array $trace = [];

    public function __construct(array $list)
    {
        $this->highElement = count($list);
        $this->list = $list;
    }

    public function find($el): int
    {
        $lastCurrent = 0;
        do {
            $currentElement = floor(($this->lowElement + $this->highElement) / 2);

            if ($currentElement === $lastCurrent) {
                $currentElement++;
            } else {
                $lastCurrent = $currentElement;
            }

            if ($this->list[$currentElement - 1] === $el) {
                $this->trace[] = (int) $currentElement;
                return $currentElement;
            } elseif($this->list[$currentElement - 1] < $el) {
                $this->trace[] = (int) $currentElement;
                $this->lowElement = $currentElement;
            } else {
                $this->trace[] = (int) $currentElement;
                $this->highElement = $currentElement;
            }
        } while ($this->lowElement !== $this->highElement);

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