<?php

namespace App\Graph;

class Deikstra
{
    private array $elements;

    private ?array $array = null;

    public function __construct(array $elements)
    {
        $this->elements = $elements;
    }

    public function getAmount(): int
    {
        $this->setArray();

        $this->process($this->elements);

        return end($this->array)['amount'];
    }

    public function getRoute(): array
    {
        if (is_null($this->array)) {
            $this->getAmount();
        }

        return array_reverse($this->getParent(end($this->array)['name']));
    }

    private function process(array $elements): void
    {
        foreach ($elements as $key => $value) {
            foreach ($value as $way) {
                $amount = $this->getParentAmount($key);
                if (($this->array[$way['name']]['amount'] == '-') || ($this->array[$way['name']]['amount'] > ($way['amount'] + $amount))) {
                    $this->array[$way['name']]['parent'] = $key;
                    $this->array[$way['name']]['amount'] = ($way['amount'] + $amount);
                    if ($this->array[$way['name']]['finished']) { //recalculate already finished node
                        $newElements = [];
                        $newElements[$way['name']] = $this->elements[$way['name']];
                        $this->process($newElements);
                    }
                }
            }
            $this->array[$key]['finished'] = true;
        }
    }

    private function setArray(): void
    {
        foreach ($this->elements as $key => $value) {
            $this->array[$key] = ['name' => $key, 'parent' => '-', 'amount' => '-', 'finished' => false];
        }
    }

    private function getParentAmount(string $parent): int
    {
        if ($this->array[$parent]['amount'] == '-') {
            return 0;
        }

        return $this->array[$parent]['amount'];
    }

    private function getParent(string $name, array $result = []): array
    {
        $result[] = $name;
        $parent = $this->array[$name]['parent'];
        if ($parent == '-') {
            return $result;
        }

        return $this->getParent($parent, $result);
    }
}
