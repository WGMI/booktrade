<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request){
        Order::create([
            'user_id' => auth()->user()->id,
            'owner_id' => $request->owner_id,
            'ordered_book_id' => $request->ordered_book_id,
            'offered_book_id' => $request->offered_book_id,
        ]);

        $owner_name = \App\Models\User::find($request->owner_id)->name;

        return redirect()->back()->with(['success' => 'Offer sent to '.$owner_name]);
    }
}
