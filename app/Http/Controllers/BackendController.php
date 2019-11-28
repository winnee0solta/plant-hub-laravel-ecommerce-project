<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Product;
use App\Order;
use App\Customerdata;

class BackendController extends Controller
{
    public function index()
    {

    //if admin
    if (Auth::user()->title == 'admin') {
        return redirect('/dashboard/products');
    }
    //if customer
    return redirect('/');
    }
    public function productsIndex()
    {

     //if customer
    if (Auth::user()->title != 'admin') {
            return redirect('/');
    }

    $datas = Product::all();

    return view('backend.home', compact('datas'));
    }

    public function addproductView()
    {

     //if customer
    if (Auth::user()->title != 'admin') {
            return redirect('/');
    }

    return view('backend.addproduct');
    }

    public function addproduct(Request $request)
    {
        if (Input::hasFile('image')) {
            //  upload product

            $product = Product::create([
                'image' => 'no',
                'name' => $request->name,
                'price' => $request->price,
            ]);
            $file = Input::file('image');
            $unique_id = uniqid();
            $file->move('images/products', $unique_id . '.' . $file->getClientOriginalExtension());
            $product->image = $unique_id . '.' . $file->getClientOriginalExtension();
            $product->save();

            //send mail
            Mail::send('mail.productadded', [], function ($message) {
                $message->from( 'basukalareeja12@gmail.com', 'Mail Service');
                $message->to( 'basukalareeja@gmail.com', 'Reeja Basukala');
                $message->subject('New Product Added!');
            });
        }

        return redirect('/dashboard/products');
    }

    public function removeProduct($id){

        Product::where('id',$id)->delete();
        //send mail
        Mail::send('mail.productremoved', [], function ($message) {
            $message->from( 'basukalareeja12@gmail.com', 'Mail Service');
            $message->to( 'basukalareeja@gmail.com', 'Reeja Basukala');
            $message->subject('  Product Removed!');
        });
        return redirect('/dashboard/products');
    }

    public function editProductView($id){
        $product =  Product::where('id',$id)->first();
        return view('backend.editproduct', compact( 'id', 'product'));
    }

    public function editProduct($id,Request $request){
        $product =  Product::where('id',$id)->first();

        $product->name = $request->name;
        $product->price = $request->price;
        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $unique_id = uniqid();
            $file->move('images/products', $unique_id . '.' . $file->getClientOriginalExtension());
            $product->image = $unique_id . '.' . $file->getClientOriginalExtension();
        }

        $product->save();

        //send mail
        Mail::send('mail.productedupdated', [], function ($message) {
            $message->from( 'basukalareeja12@gmail.com', 'Mail Service');
            $message->to( 'basukalareeja@gmail.com', 'Reeja Basukala');
            $message->subject('Product Updated!');
        });

        return redirect('/dashboard/products');

    }


    public function ordersIndex()
    {

        //if customer
        if (Auth::user()->title != 'admin') {
            return redirect('/');
        }

        $datas = array();
        $orders = Order::all();
        $count =1;
        foreach ($orders as $order) {
            $product =  Product::find( $order->product_id);
            $customerdata = Customerdata::find($order->customer_id)->first();
            if( $product){

                $temp_array = array(
                    'id'=>$order->id,
                    'sn'=>$count,
                    'date'=>$order->created_at->format('Y-m-d'),
                    'image'=> $product->image,
                    'name'=> $product->name,
                    'price'=> $product->price,
                    'customer_name'=> $customerdata->name,
                    'customer_phone'=> $customerdata->phone,
                );
                array_push($datas,$temp_array);
                $count++;
            }
        }
        return view('backend.orders', compact('datas'));
    }

    public function orderRemove($id)
    {

        Order::where('id', $id)->delete();
        //send mail
        Mail::send('mail.ordercompleted', [], function ($message) {
            $message->from( 'basukalareeja12@gmail.com', 'Mail Service');
            $message->to( 'basukalareeja@gmail.com', 'Basukala Reeja ');
            $message->subject('Order Removed/Completed!');
        });
        return redirect('/dashboard/orders');
    }

}
