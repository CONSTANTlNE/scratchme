<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $products=Product::with('prices','media')->get();

        return view('test',compact('products'));
    }
}
