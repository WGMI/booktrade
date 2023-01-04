<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Cart;

class OrderController extends Controller
{
    public function index(){
        $orders = auth()->user()->orders;
        $offers = Order::where('owner_id',auth()->user()->id)->get();
        return view('orders')->with(['orders' => $orders, 'offers' => $offers]);
    }

    public function store(Request $request){
        Order::create([
            'user_id' => auth()->user()->id,
            'owner_id' => $request->owner_id,
            'ordered_book_id' => $request->ordered_book_id,
            'offered_book_id' => $request->offered_book_id,
        ]);

        $owner_name = \App\Models\User::find($request->owner_id)->name;
        Cart::destroy();

        return redirect('/')->with(['order_success' => 'Offer sent to '.$owner_name]);
    }

    public function update(Request $request,$id){
        $order = Order::find($id);
        $order->offered_book_id = $request->bookid;
        $order->save();
        return redirect('/orders')->with('success','Updated successfully');
    }

    public function accept($id){
        return time();
    }

    public function destroy($id){
        $order = Order::find($id);
        $order->delete();
        return 1;
    }
}
