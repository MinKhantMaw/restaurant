<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $dishes = Dish::get();
        return view('order_form',compact('dishes'));
    }

    public function orderSubmit(Request $request)
    {
       $data = array_filter($request->except('_token'));
       $orderId = 'OrderNo.' . rand();
       $request->table_id = 1;
       dd($orderId);
       foreach ($data as $key => $value) {
            if($value > 1) {
                for ($i = 0; $i < $value ; $i++) {
                       $order = new Order();
                       $order->order_id = $orderId;
                       $order->dish_id = $key;
                       $order->table_id = $request->table_id;
                }
            }
            else{
                echo $value;
            }
       }
    }
}
