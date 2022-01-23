<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\OrderTrack;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.order.index', compact('orders'));
    }

    public function pickup()
    {
        $orders = OrderTrack::orderBy('created_at', 'DESC')->where('status','=',1)->paginate(10);
        return view('admin.order.pickup', compact('orders'));
    }

    public function delivery()
    {
        $orders = OrderTrack::orderBy('created_at', 'DESC')->where('status', '=', 2)->paginate(10);
        return view('admin.order.delivery', compact('orders'));
    }
}
