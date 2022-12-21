<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Models\Book;

class BookController extends Controller
{
    public function show($id){
        return view('book')->with('id',$id);
    }

    public function store(Request $request){
        $check = Book::where([['open_lib_work_id',$request->open_lib_work_id],['user_id',auth()->user()->id]])->first();
        if($check){
            return 0;
        }

        $url = $request->imageurl;
        $contents = file_get_contents($url);
        $name = $request->open_lib_work_id.'.jpg';
        // \Illuminate\Support\Facades\Storage::disk('public')->put('images/covers/'.$name,$contents);
        Storage::put('images/covers/'.$name,$contents);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'open_lib_work_id' => $request->open_lib_work_id,
            'information' => $request->information,
            'condition' => $request->condition,
            'user_id' => auth()->user()->id,
        ]);

        return 1;
    }
}
