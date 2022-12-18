<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function index(){
        $products=Product::limit(8)->get();
        return view('site.index',compact('products'));
    }
    public function viewSingleItem($id){
        $product = Product::where('id',$id)->first();
        return view('site.single_item',compact('product'));
    }

    public function viewAllItem(Request $request)
    {

        if($request->title){
            $title=$request->title;
            $products = Product::where('title','like',"%".$title."%")->paginate(9);
        }else{
            $title=null;
        $products = Product::paginate(9);
        }
        return view('site.all_items',compact('products','title'));
    }
    public function contactUs()
    {
        return view('site.contact_us');
    }
    public function addToCart(Request $request)
    {
        $product_id = $request->product_id;
        $quantity= $request->quantity;
        $product = Product::where('id',$product_id)->first();
        if($product){
            \Cart::add(array(
                'id' => $product_id,
                'name' => $product->title,
                'price' => $product->price,
                'quantity' => $quantity,
                'attributes' => array(),
                'associatedModel' =>$product
            ));

        }
        $cart_count =\Cart::getTotalQuantity();
        return $cart_count;
    }
    public function viewCart(){

        $items = \Cart::getContent();

        return view('site.cart',compact('items'));
    }
    public function updateCart(Request $request)
    {
        $product_id = $request->product_id;
        $quantity= $request->quantity;
        $type=$request->CartType;
        if($type == 'minus'){
            $quantity = $quantity-1;
        }else{
            $quantity = $quantity+1;
        }

        \Cart::update($product_id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $quantity
            ),
          ));

          $itemTotal = \Cart::get($product_id)->getPriceSum();
          $cartTotal=\Cart::getTotal();
          $cartTotal= number_format($cartTotal,2);
          $itemTotal= number_format($itemTotal,2);
          $cart_count =\Cart::getTotalQuantity();
          return response()->json([
            'item_total'=>$itemTotal,
            'cart_total'=>$cartTotal,
            'cart_count'=>$cart_count
          ]);

    }
    public function removeCart($id){
        \Cart::remove($id);
        return back();
    }
    public function checkout()
    {
        $items = \Cart::getContent();
        $cartTotal=\Cart::getTotal();
        return view('site.checkout',compact('items','cartTotal'));
    }
}
