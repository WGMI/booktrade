<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function store(Request $request){
        if(Cart::count()){
            return 0;
        }
        Cart::add($request->id,$request->name,1,0)->associate('App\Models\Book');
        return 1;
    }
}
