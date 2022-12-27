<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Wish;

class WishController extends Controller
{
    public function store(Request $request){
        $check = Wish::where([['open_lib_work_id',$request->open_lib_work_id],['user_id',auth()->user()->id]])->first();
        if($check){
            return 0;
        }

        Wish::create([
            'title' => $request->title,
            'open_lib_work_id' => $request->open_lib_work_id,
            'user_id' => auth()->user()->id,
        ]);
        return 1;
    }
}
