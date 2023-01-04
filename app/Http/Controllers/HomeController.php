<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $featured = Book::all()->sortByDesc('created_at')->take(4);
        //$featured = Book::inRandomOrder()->limit(4)->get();
        return view('index',compact('featured'));
    }
}
