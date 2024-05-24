<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderCompleteController extends Controller
{
    public function index(){
        return view("orders.complete");
    }
}
