<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderPendingController extends Controller
{
    public function index(){
        return view("orders.pending");
    }
}
