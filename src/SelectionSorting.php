<?php

namespace App;

class SelectionSorting
{
    private array $result = [];
    private string $order;

    public function __construct(string $order)
    {
        $variants = ['max', 'min'];

        if (!in_array($order, $variants)) {
            throw new \Exception('Wrong way of sorting!');
        }

        $this->order = $order;
    }


    public function sort(array $array): array
    {
        while (count($array) != 0) {
            $array = $this->takeMaxElement($array);
        }


        return $this->result;
    }

    private function takeMaxElement(array $array): array
    {
        $index = 0;
        $proper = $array[$index];

        for ($i=0; $i<count($array); $i++) {
            if ($this->order == 'max') {
                if ($array[$i] > $proper) {
                    $index = $i;
                    $proper = $array[$index];
                }
            } else {
                if ($array[$i] < $proper) {
                    $index = $i;
                    $proper = $array[$index];
                }
            }
        }

        $this->result[] = $proper;
        unset($array[$index]);

        return array_values($array);
    }
}