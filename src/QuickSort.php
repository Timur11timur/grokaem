<?php

namespace App;

class QuickSort
{
    public function sort($array)
    {
        if (!is_array($array)) {
            throw new \Exception('I can sort only arrays');
        }
        if (count($array) <= 1) {
            return $array;
        }
        if (count($array) == 2) {
            if ($array[0] > $array[1]) {
                $result = [$array[1], $array[0]];
            } else {
                $result = [$array[0], $array[1]];
            }

            return $result;
        }

        $keystone = $array[0];

        $arr1 = [];
        $arr2 = [];
        foreach ($array as $key => $value) {
            if ($key == 0) {
                continue;
            }
            if ($array[$key] < $keystone) {
                $arr1[] = $array[$key];
            } else {
                $arr2[] = $array[$key];
            }
        }

        $result = array_merge($this->sort($arr1), [$keystone]);
        $result = array_merge($result, $this->sort($arr2));

        return $result;
    }

    public static function instance()
    {
        return new static();
    }
}