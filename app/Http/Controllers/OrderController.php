<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;
use function array_filter;
use function compact;
use function config;
use function rand;
use function redirect;
use function view;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $dishes = Dish::orderBy('id','desc')->get();
        $tables = Table::all();
        return view('order_form', compact('dishes','tables'));
    }
    public function submit(Request $request){
//        dd(array_filter($request->except('_token')));
        $data = array_filter($request->except('_token','Table'));
        $orderID = rand();
        $request->table = 1;
        foreach ($data as $key => $value){
            if ($value > 1){
                for ($i = 0; $i <= $value ; $i++){
                    $this->saveOrder($orderID,$key, $request);
                }
            }else{
                $this->saveOrder($orderID,$key, $request);
            }
        }
        return redirect('/order')->with('message', 'Order Submitted');
    }
    public function saveOrder($orderID,$dish_id,$request){
        $order = new Order();
        $order->order_id = $orderID;
        $order->dish_id = $dish_id;
        $order->table_id = $request->table;
        $order->status = config('res.order_status.new');

        $order->save();
    }
}
