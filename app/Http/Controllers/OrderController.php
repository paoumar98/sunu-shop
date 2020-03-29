<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }


    public function confirm($id) {

        $order = Order::find($id);

        $order->update(['status' => 1]);

        session()->flash('msg','La commande a été confirmée');

        return redirect('admin/orders');


    }


    public function pending($id){

        $order = Order::find($id);

        $order->update(['status' => 0]);

        session()->flash('msg','La commande est de nouveau en attente');
        return redirect('admin/orders');

    }

    public function show($id) {
        $order = Order::find($id);
        return view('admin.orders.details', compact('order'));
    }

}
