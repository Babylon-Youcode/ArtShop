<?php
namespace App;
class Cart{

    public $items = [];
    public $totalQuantity;
    public $totalPrice;

    public function __construct($cart=null){
        if($cart){
            $this->items = $cart->items;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuantity = $cart->totalQuantity;
        }else{
                $this->items = [];
                $this->totalPrice=0;
                $this->totalQuantity=0;
            }
        
    }
    public function add($product){
        $item = [
            'id'=>$product->id,
            'name'=>$product->name,
            'price'=>$product->price,
            'qty'=>0,
            'image'=>$product->image
        ];
        if(!array_key_exists($product->id,$this->items)){
            $this->items[$product->id] = $item;
            $this->totalPrice+=$product->price;
            $this->totalQuantity+=1;
        }else{
            $this->totalPrice+=$product->price;
            $this->totalQuantity+=1;
        
        }
        $this->items[$product->id]['qty']+=1;
    }
    public function updateQuantity($id,$qty){
        $this->totalQuantity-=$this->items[$id]['qty'];
        $this->totalPrice-=$this->items[$id]['price']*$this->items[$id]['qty'];
        //add the item with new qty
        $this->items[$id]['qty']=$qty;
        $this->totalQuantity+=$qty;
        $this->totalPrice+=$this->items[$id]['price']*$qty;
    }
    public function remove($id){
        if(array_key_exists($id,$this->items)){
            $this->totalQuantity-=$this->items[$id]['qty'];
            $this->totalPrice-=$this->items[$id]['qty']*$this->items[$id]['price'];
            unset($this->items[$id]);
        }
    }
}