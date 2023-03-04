<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Community;
use App\Models\Post;
use App\Models\Product;
use App\Models\SharedOrder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['latestOrder'] = Order::orderBy('id', 'desc')->take(10)->get();
        $data['total_pesanan'] = Order::count();
        $data['total_komunitas'] = Community::count();
        $data['total_anggota'] = User::count();
        $data['kapasitas_produksi'] = User::sum('max_production');
        $data['orders'] = Order::orderBy('id', 'desc')->paginate(9);
        return view('dashboard', $data);
    }

    public function home()
    {
        $data['products'] = Product::take(6)->orderBy('id', 'desc')->get();
        $data['news'] = Post::take(3)->orderBy('id', 'desc')->get();
        return view('frontend.index',$data);
    }

    public function about()
    {
        return view('frontend.tentang');
    }
    public function newsDetail($slug)
    {
        $data['news'] = Post::where('slug' , $slug)->first();
        $data['latestNews'] = Post::orderBy('id', 'desc')->take(6)->get();
        return view('frontend.detail-berita',$data);
    }

    public function productDetail($id)
    {
        $data['product'] = Product::where('slug',$id)->first();
        return view('frontend.detail-product',$data);
    }

    public function allNews()
    {
        $data['news'] = Post::orderBy('id', 'desc')->paginate(9);
        return view('frontend.semua-berita',$data);
    }
    public function allProduct()
    {
        $data['products'] = Product::orderBy('id', 'desc')->paginate(9);
        return view('frontend.semua-produk',$data);
    }
    public function beli(Request $request)
    {
        $data['product'] = Product::find($request->id);
        $data['qty'] = $request->qty;
        return view('frontend.order',$data);
    }
    public function beliPost(Request $request)
    {
        $p = Product::find($request->product_id);
        $order = new Order();
        $order->product_id = $request->product_id;
        $order->customer_name = $request->customer_name;
        $order->customer_phone = $request->customer_phone;
        $order->payment_method = 'website';
        $order->down_payment = '0';
        $order->total_price = ($p->price * $request->qty);
        $order->payment_status = 'unpaid';
        $order->status = 'pending';
        $order->note = $request->note;
        $order->estimate_time = '';
        $order->qty = $request->qty;
        $order->save();

        return redirect('/home/beli/'.$p->id)->with('success' , 'Berhasil membuat pesanan ! , anda akan segera dihubungi oleh admin kami untuk proses selanjutnya');
    }

    public function invoice(Request $request)
    {
        $data['order'] = Order::find($request->id);
        return view('frontend.invoice',$data);
    }
   
}
