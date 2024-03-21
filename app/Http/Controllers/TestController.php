<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class TestController extends Controller
{
    public function index(Request $request){

//        $products=Product::with('prices','media')->get();

       dd( $request->ip());

        $userId = $request->cookie('user_id');

        if (!$userId) {
            // Generate a unique identifier for the user
            $userId = uniqid();

            // Store the identifier in a cookie
            Cookie::queue('user_id', $userId, 60 * 24 * 30); // Expires in 1 year
        }

        return view('test',compact('userId'));
    }
}
