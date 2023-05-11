<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $dishes = Dish::get();
        $tables = Table::get();
        return view('order_form', compact('dishes', 'tables'));
    }

    public function orderSubmit(Request $request)
    {
        $data = array_filter($request->except('_token', 'table'));
        $orderId = rand();
        foreach ($data as $key => $value) {
            if ($value > 1) {
                for ($i = 0; $i < $value; $i++) {
                   $this->saveOrder($orderId,$key,$request);
                }
            } else {
                $this->saveOrder($orderId,$key,$request);
            }
        }

        return redirect()->route('order-index')->with(['create' => 'Order Created Successfully']);
    }

    public function saveOrder($orderId,$dish_id,$request)
    {
        $order = new Order();
        $order->order_id = $orderId;
        $order->dish_id = $dish_id;
        $order->table_id = $request->table;
        $order->status = config('res.order_status.new');
        $order->save();
    }

    public function orderList()
    {
       $orders = Order::with(['table','dishes'])->get();
       return view('orders.index',compact('orders'));
    }
}
