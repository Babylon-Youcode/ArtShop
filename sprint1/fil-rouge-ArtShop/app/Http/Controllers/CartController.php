<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use http\Client\Curl\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;




class CartController extends Controller
{
    /**
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function addToCart(Product $product){



        if(Auth::user())
        {
            if(session()->has('cart')){
                $cart = new Cart(session()->get('cart'));
            }else{
                $cart = new Cart();
            }
            $cart->add($product);
            session()->put('cart',$cart);
            notify()->success('Product added to cart!');
            return redirect()->back();

        }

        else{

            notify()->success('You should log in');
            return redirect()->to('home');

        }

    }
    public function showCart(){

        if(Auth::user()){
            if(session()->has('cart')){
                $cart = new Cart(session()->get('cart'));
            }else{
                $cart = null;
            }
            return view('cart',compact('cart'));
        }
           else
           {
               notify()->success('You should log in');
               return redirect()->to('home');
           }


    }
    public function updateCart(Request $request, Product $product){
        $request->validate([
            'qty'=>'required|numeric|min:1'
        ]);
        $cart = new Cart(session()->get('cart'));
        $cart->updateQuantity($product->id, $request->qty);
        session()->put('cart',$cart);
        notify()->success('cart updated');
        return redirect()->back();
    }
    public function removeCart(Product $product){
        $cart = new Cart(session()->get('cart'));
        $cart->remove($product->id);
        if($cart->totalQuantity<=0){
            session()->forget('cart');
        }else{
            session()->put('cart',$cart);
        }
        notify()->success('cart deleted');
             return redirect()->back();
    }
    public function checkout($amount){
        return view('/checkoutt')->with('amount',$amount);

    }


    public function charge(Request $request){

  //5321 9621 4732 2566

     $charge = Stripe::charges()->create([

               'currency' => 'MAD',
                'source' => $request->get('stripeToken'),
                 'amount' => $request->get('amount'),
                   'description' => 'Payment for Artshop'
     ]);


     $chargeId = $charge['id'];

     if($chargeId){

         auth()->user()->orders()->create([

                    'cart' => serialize(session()->get('cart'))
         ]);

         session()->forget('cart');
         notify()->success('Transaction Completed');
         return redirect()->to('home');

     }
     else{

         return redirect()->back();
     }


    }

    public function order(){


        $user = auth()->user();


        $orders = auth()->user()->orders;

        $carts = $orders->transform(function($cart,$key){


            return unserialize($cart->cart);
        });


        return view('order',compact('carts','user'));



    }

    public static function getCartInfo(){

        if(session()->has('cart'))
        {

            $cart = new Cart(session()->get('cart'));
            $items = $cart->items;
            $total = $cart->totalPrice;
            $quantity = $cart->totalQuantity;

            return compact('items','total','quantity');
        }

    }



}


