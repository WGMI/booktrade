<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        $q = $request->input('query');
        return view('search',compact('q'));
    }
}
