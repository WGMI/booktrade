<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function store(Request $request){
        // $id = $request->id;
        // $present = false;
        // Cart::search(function ($cartItem, $rowId) use ($id,$present) {
        //     if($cartItem->id == $id){
        //         \Illuminate\Support\Facades\Log::info(1234567);
        //         $present = true;
        //         return 0;
        //     }
        // });

        // if(!$present){
        //     Cart::add($request->id,$request->name,1,0)->associate('App\Models\Book');
        //     return 1;
        // }

        Cart::add($request->id,$request->name,1,0)->associate('App\Models\Book');
        return 1;
    }
}
