<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class JelajahiController extends Controller
{
    public function index()
    {
        $featured = Product::inRandomOrder()->take(3)->get();
        $allProducts = Product::all();

        return view('jelajahi', compact('featured', 'allProducts'));
    }
}
