<?php

namespace FRD;


class Cart
{

    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function add($id, $name, $price)
    {
        $this->items += [
            $id => [
                'qtd' => isset($this->items[$id]['qtd']) ? $this->items[$id]['qtd']++ : 1,
                'price' => $price,
                'name' => $name
            ]
        ];

        return $this->items;
    }

    public function updateQtd($id, $qtd)
    {
        $qtd < 1 ? $this->remove($id) : $this->items[$id]['qtd'] = $qtd;

        return $this->items;
    }

    public function remove($id)
    {
        unset($this->items[$id]);
    }

    public function all()
    {
        return $this->items;
    }

    public function getTotal()
    {
        $total = 0;
        foreach($this->items as $item) {
            $total += $item['qtd'] * $item['price'];
        }

        return $total;
    }

}