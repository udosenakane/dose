<?php

namespace App\Models;


class Cart
{
    public $items = [];
    public $totalQty = 0;
    public $totalPrice = 0;
    
    public function __construct($cart){
        if($cart){
            $this->items = $cart->items;
            $this->totalQty = $cart->totalQty;
            $this->totalPrice = $cart->totalPrice;
        }
    }

    public function addItem($item){
        $storeItem = ['id' => $item->id, 'qty' => 0, 'total' => $item->price, 'item' => $item];
        $index = array_search($item->id, array_column($this->items, 'id'));
        if(count($this->items)){
            if(is_numeric($index)){
                $storeItem = $this->items[$index];
            }
        }
        $storeItem['qty']++;
        $storeItem['total'] = $item->price * $storeItem['qty'];
        if(is_numeric($index))
            $this->items[$index] = $storeItem;
        else
            $this->items[] = $storeItem;
        $this->totalQty++;
        $this->totalPrice += $item->price; 
    }

    public function decrementItem($item){
        $index = array_search($item->id, array_column($this->items, 'id'));
        if(count($this->items)){
            if(is_numeric($index)){
                $storeItem = $this->items[$index];
            }
        }
        if($storeItem['qty'] > 1)
            $storeItem['qty']--;
        $storeItem['total'] = $item->price * $storeItem['qty'];
        if(is_numeric($index))
            $this->items[$index] = $storeItem;
        $this->totalQty--;
        $this->totalPrice -= $item->price; 
    }

    public function deleteItem($item){
        if(count($this->items)){
            $index = array_search($item->id, array_column($this->items, 'id'));
            if(is_numeric($index)){
                $storeItem = $this->items[$index];
                $this->totalQty -= $storeItem['qty'];
                $this->totalPrice -= $storeItem['total']; 
                array_splice($this->items, $index, 1);
            }
        }
    }
}
