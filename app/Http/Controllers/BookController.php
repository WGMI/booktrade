<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Models\Book;
use App\Models\Wish;

class BookController extends Controller
{
    public function show($id){
        $ownedbooks = Book::where('open_lib_work_id',$id)->get();
        $ownedbook = (auth()->user()) ? Book::where(['user_id'=>auth()->user()->id,'open_lib_work_id'=>$id])->first() : null;
        $wishes = Wish::where('open_lib_work_id',$id)->get();
        return view('book')->with(['id' => $id, 'ownedbooks' => $ownedbooks, 'wishes' => $wishes, 'ownedbook' => $ownedbook]);
    }

    public function showlibrary(){
        $books = Book::where('user_id',auth()->user()->id)->get();
        return view('library')->with('books',$books);
    }

    public function showuserlibrary($id,$userid){
        $user = \App\Models\User::find($userid);
        $books = Book::where('user_id',$userid)->get();
        return view('userlibrary',compact('books','user','id'));
    }

    public function store(Request $request){
        $check = Book::where([['open_lib_work_id',$request->open_lib_work_id],['user_id',auth()->user()->id]])->first();
        if($check){
            return 0;
        }

        // $url = $request->imageurl;
        // $contents = file_get_contents($url);
        // $name = $request->open_lib_work_id.'.jpg';
        // // \Illuminate\Support\Facades\Storage::disk('public')->put('images/covers/'.$name,$contents);
        // Storage::disk('public')->put('images/covers/'.$name,$contents);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'open_lib_work_id' => $request->open_lib_work_id,
            'cover_url' => $request->imageurl,
            'information' => $request->information,
            'condition' => $request->condition,
            'user_id' => auth()->user()->id,
        ]);

        return 1;
    }

    public function update(Request $request,$id){
        $book = Book::find($id);
        $book->information = $request->information;
        $book->condition = $request->condition;
        $book->save();
        return 2;
    }

    public function destroy($id){
        $book = Book::find($id);
        $book->delete();
        return 1;
    }
}
