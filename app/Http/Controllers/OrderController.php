<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Community;
use App\Models\Delivery;
use App\Models\Expedition;
use App\Models\Product;
use App\Models\SharedOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        if(auth()->user()->level == 'admin'){
            $data['orders'] = Order::orderBy('id', 'desc')->get();
        }else{
            $data['orders'] = Order::where('community_id' , auth()->user()->community_id)->orderBy('id', 'desc')->get();
        }

        return view('orders',$data);
    }

    public function create()
    {
        $data['isEdit'] = false;
        $data['edit'] = null;
        $data['products'] = Product::all();
        $data['communities'] = Community::all();
        return view('crud._order_form',$data);
    }
    public function store(Request $request)
    {
        $order = new Order();
        $order->product_id = $request->product_id;
        $order->customer_name = $request->customer_name;
        $order->customer_phone = $request->customer_phone;
        $order->payment_method = $request->payment_method;
        $order->down_payment = $request->down_payment;
        $order->total_price = $request->total_price;
        $order->payment_status = $request->payment_status;
        $order->status = $request->status;
        $order->note = $request->note;
        $order->estimate_time = $request->estimate_time;
        $order->qty = $request->qty;
        $order->save();

        return redirect('/orders')->with('success' , 'Berhasil menambah pesanan');
    }

    public function edit($id)
    {
        $data['isEdit'] = true;
        $data['edit'] = Order::find($id);
        $data['product'] = Product::find($data['edit']->product_id);
        $data['communities'] = Community::all();
        return view('crud._order_form',$data);
    }

    public function update(Request $request,$id)
    {
        $order = Order::find($id);
        $order->customer_name = $request->customer_name;
        $order->customer_phone = $request->customer_phone;
        $order->payment_method = $request->payment_method;
        $order->down_payment = $request->down_payment;
        $order->total_price = $request->total_price;
        $order->payment_status = $request->payment_status;
        $order->status = $request->status;
        $order->note = $request->note;
        $order->estimate_time = $request->estimate_time;
        $order->save();

        return redirect('/orders')->with('success' , 'Berhasil mengubah pesanan');
    }

    public function distribute()
    {
        $data['distributions'] = Order::where('status' , 'distribute')->orWhere('status' , 'on_hold')->orWhere('status' , 'production')->orWhere('status' , 'production_done')->orderBy('id', 'desc')->get();
        return view('distribution',$data);
    }

    public function shipping()
    {
        $data['shippings'] = Delivery::orderBy('id', 'desc')->get();
        return view('shipping',$data);
    }

    public function distributeOrder($id)
    {
        $data['order'] = Order::find($id);
        $data['product'] = $data['order']->product;
        $data['communities'] = Community::all();
        return view('distribute-order',$data);
    }
    public function distributeOrderPost(Request $request , $id)
    {
        $order = Order::find($id);
        $order->status = 'distribute';
        $order->community_id = $request->community_id;
        $order->save();
        return redirect('/orders')->with('success' , 'Pesanan berhasil didistribusikan');
    }

    public function sharedOrder($id)
    {
        $data['order'] = Order::find($id);
        $data['community'] = User::where('community_id' ,$data['order']->community_id)->get();
        $data['product'] = Product::find($data['order']->product_id);
        return view('share-order' , $data);
    }
    public function sharedOrderPost(Request $request,$id)
    {
        $order = Order::find($id);
        $order->status = 'production';
        $order->note = 'Pesanan di bagikan ke anggota produksi';
        $order->estimate_time = $request->estimate_time;
        $order->save();

   
        // dd($request->user);
        foreach($request->user as $user_id=>$production)
        {
            $shared = new SharedOrder();
            $shared->order_id = $id;
            $shared->community_id = auth()->user()->community_id;
            $shared->user_id = $user_id;
            $shared->production_total = $production;
            $shared->note = 'Di bagikan ke anggota produksi';
            $shared->status = 'production';    
            $shared->save();
        }
    

        return redirect('/orders')->with('success' , 'Pesanan berhasil di bagikan ke produksi');
    }
    public function doneOrder($id)
    {
        $order = Order::find($id);
        $order->status = 'production_done';
        $order->save();

        return redirect('/orders')->with('success' , 'Pesanan telah selesai');
    }

    public function orderShipping($id)
    {
        $data['order'] = Order::find($id);
        $data['expeditions'] = Expedition::all();
        return view('shipping-add' , $data);
    }

    public function orderShippingPost(Request $request,$id)
    {
        // $order = Order::find($id);
        // $order->status = 'shipping';
        // $order->save();

        $delivery = new Delivery();
        $delivery->distribution_id = 0;
        $delivery->order_id = $id;
        $delivery->expedition_id =  $request->expedition_id;
        $delivery->estimated_time = $request->estimated_time;
        $delivery->note = $request->note;
        $delivery->delivery_date = $request->delivery_date;
        $delivery->save();

        return redirect('/shipping')->with('success' , 'Pesanan telah dikirim');
    }
}
