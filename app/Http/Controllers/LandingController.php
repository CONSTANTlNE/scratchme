<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class LandingController extends Controller
{

    public function index()
    {

        $products = Product::with('prices', 'media', 'features')
            ->where('active', 1)
            ->where('for_landing', 1)
            ->orderBy('position', 'asc')
            ->get();

        return view('index',compact('products'));
    }
}
