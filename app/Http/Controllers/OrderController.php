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

        $status=array_flip(config('res.order_status'));
        $orders=Order::with('table','dishes')->whereIn('status',[4])->get();
        return view('order_form', compact('dishes', 'tables','orders','status'));
    }

    public function orderSubmit(Request $request)
    {
        $data = array_filter($request->except('_token', 'table'));
        $orderId = rand();
        foreach ($data as $key => $value) {
            if ($value > 1) {
                for ($i = 0; $i < $value; $i++) {
                    $this->saveOrder($orderId, $key, $request);
                }
            } else {
                $this->saveOrder($orderId, $key, $request);
            }
        }

        return redirect()->route('order-index')->with(['create' => 'Order Created Successfully']);
    }

    public function saveOrder($orderId, $dish_id, $request)
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
        $status=array_flip(config('res.order_status'));
        $orders=Order::with('table','dishes')->whereIn('status',[1,2])->get();
        return view('orders.index',compact('orders','status'));
    }

    public function approve(Order $order)
    {
        $order->status = config('res.order_status.processing');
        $order->save();
        return redirect()->route('order-list')->with(['create' => 'Order Approve ']);
    }

    public function cancel(Order $order)
    {
        $order->status = config('res.order_status.cancel');
        $order->save();
        return redirect()->route('order-list')->with(['create' => 'Order Reject ']);
    }

    public function ready(Order $order)
    {
        $order->status = config('res.order_status.ready');
        $order->save();
        return redirect()->route('order-list')->with(['create' => 'Order Approve ']);
    }

    public function serve(Order $order)
    {
        $order->status = config('res.order_status.done');
        $order->save();
        return redirect()->route('order-index')->with(['create' => 'Order Serve to customer ']);
    }


}
