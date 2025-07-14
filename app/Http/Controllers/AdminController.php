<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
{
    $orders = \App\Models\Order::latest()->paginate(10);
    return view('admin.dashboard', compact('orders'));
}

}

