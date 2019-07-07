<?php

namespace App\Http\Controllers;

use App\Products;
use Cart;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public  function  cartAdd(Request $request){
        $product = Products::find($request->id);

//        Cart::session($sessionKey);

        Cart::add(array(
            'id' => $request->id,
            'name' => $product->product_name,
            'price' => $product->product_price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'imageF' =>  $product->product_imageF,
                'mageS'  =>  $product->product_imageS,
                'about'  =>  $product->short_info,
            )
        ));
        $cartProducts = Cart::getContent();
        $totalQuantity =  Cart::getTotalQuantity();

        return redirect('/cart/viewProducts')->with([
            'items'=>$cartProducts,
            'total'=>$totalQuantity,
        ]);

    }

    public  function  cartProductView(){
        $cartProducts = Cart::getContent();
        $totalQuantity =  Cart::getTotalQuantity();

        return view('front-end.cart',[
            'items'=>$cartProducts,
            'total' => $totalQuantity,
        ]);
    }

    public  function  removeItem($id){
        Cart::remove($id);

        $cartProducts = Cart::getContent();
        $totalQuantity =  Cart::getTotalQuantity();

        return redirect('/cart/viewProducts')->with([
            'items'=>$cartProducts,
            'total'=>$totalQuantity,
        ]);
    }

    public  function  checkOut(){
        return view('front-end.checkout');
    }

    public  function  updateQuantity(Request $request){
        Cart::update($request->id ,array(
            'quantity' => $request->quantity,
        ));
        $cartProducts = Cart::getContent();
        $totalQuantity =  Cart::getTotalQuantity();

        return redirect('/cart/viewProducts')->with([
            'items'=>$cartProducts,
            'total'=>$totalQuantity,
        ]);
    }

    public  function  clearCart(){


        Session::forget('totalBill');
        Session::forget('totalQuantity');
        Cart::clear();
        return redirect('/');
    }

}
