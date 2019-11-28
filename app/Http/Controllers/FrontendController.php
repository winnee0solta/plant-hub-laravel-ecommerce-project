<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Product;
use App\Cart;
use App\Customerdata;
use App\Order;

class FrontendController extends Controller
{
    public function homeView(){

       $products =  Product::get()->take(8);
        return view('frontend.home',compact('products'));
    }
    public function shopView(){
        $products =  Product::all();
        return view( 'frontend.shop', compact('products'));
    }
    public function aboutusView(){
        return view('frontend.aboutus');
    }

    public function cartView(){
        $datas = array();
        $totalamount = 0;
        $itemcount = 0;
        $cartproducts = Cart::where( 'user_id', Auth::user()->id)->get();
        foreach ($cartproducts as $cart) {
            $product =  Product::find($cart->product_id);
            if ($product) {
                $itemcount++;
                $totalamount = (float)  $totalamount + (float) $product->price;
                $temp_array = array(
                    'product_id'=>$product->id,
                    'cart_id'=>$cart->id,
                    'image'=>$product->image,
                    'name'=>$product->name,
                    'name'=>$product->name,
                    'price'=>$product->price,
                );
                array_push($datas,$temp_array);
          }
        }
        return view('frontend.cart',compact('datas','totalamount','itemcount'));
    }
    public function addToCart($id){

        //if admin
        if (Auth::user()->title != 'customer') {
            return redirect('/');
        }

        // add to cart
        Cart::create([
            'product_id'=>$id,
             'user_id'=> Auth::user()->id,
        ]);

        return redirect('/cart');
    }
    public function removeFromCart($id){

        //if admin
        if (Auth::user()->title != 'customer') {
            return redirect('/');
        }

        Cart::where('id',$id)->delete();

        return redirect('/cart');
    }

    public function checkoutView()
    {
        $name = '';
        $phone = '';
        if ( Customerdata::where('user_id', Auth::user()->id)->count() > 0) {

            $customerdata =  Customerdata::where('user_id', Auth::user()->id)->first();
            $name = $customerdata->name;
            $phone = $customerdata->phone;
        }
        return view('frontend.checkout',compact('name','phone'));
    }
    public function checkout(Request $request)
    {
        if (Customerdata::where('user_id', Auth::user()->id)->count() > 0) {

            $customerdata =  Customerdata::where('user_id', Auth::user()->id)->first();
             $customerdata->name = $request->name;
             $customerdata->phone = $request->phone;
             $customerdata->save();

        }else{
            //create new instance
           $customerdata = Customerdata::create([
                'user_id'=> Auth::user()->id,
                'name'=>$request->name,
                'phone'=>$request->phone,
            ]);

        }

        $cartproducts = Cart::where('user_id', Auth::user()->id)->get();
        foreach ($cartproducts as $cart) {
            $product =  Product::find($cart->product_id);
            if ($product) {

                // place order
                Order::create([
                    'customer_id'=> Auth::user()->id,
                    'product_id'=> $customerdata->id
                ]);
                Cart::where('id', $cart->id)->delete();
            }
        }

        //mail to customer
        $mail = Auth::user()->email;
        Mail::send('mail.ordered', [], function ($message) use ($mail) {
            $message->from( 'basukalareeja12@gmail.com', 'Mail Service');
            $message->to( $mail, 'Customer');
            $message->subject('Product Ordered!');
        });
        //mail to admin
        $mail = Auth::user()->email;
        Mail::send('mail.ordered', [], function ($message) use ($mail) {
            $message->from( 'basukalareeja12@gmail.com', 'Mail Service');
            $message->to( 'basukalareeja@gmail.com', 'Basukala Reeja');
            $message->subject('Product Ordered!');
        });

        return redirect('/');
    }
}
