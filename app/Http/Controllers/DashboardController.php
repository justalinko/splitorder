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
    public function newsDetail($id)
    {
        $data['news'] = Post::find($id);
        return view('frontend.news-detail',$data);
    }

    public function productDetail($id)
    {
        $data['product'] = Product::where('slug',$id)->first();
        return view('frontend.detail-product',$data);
    }
}
