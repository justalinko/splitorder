<?php

namespace App\Http\Controllers\CRUD;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->level == 'admin')
        {
            $data['products'] = Product::all();
            return view('crud._product' , $data);
        }else{
        $data['products'] = Product::where('user_id' , auth()->user()->id)->get();
        return view('crud._product' , $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['isEdit'] = false;
        $data['edit'] = null;
        return view('crud._product_form',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pro = new Product();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = Str::slug($request->name).'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/') , $filename);
            $pro->image = url('uploads/'.$filename);
        }else{
            $pro->image = "https://via.placeholder.com/640x480.png/dddddd?text=".$request->name;
        }

        $pro->name = $request->name;
        $pro->price = $request->price;
        $pro->slug = Str::slug($request->name);
        $pro->user_id = auth()->user()->id;
        $pro->description = $request->description;
        $pro->min_order = $request->min_order;
        $pro->max_order = $request->max_order;
        $pro->note = $request->note;

        $pro->save();

        return redirect('/product')->with('success' , 'Berhasil menambahkan produk');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['isEdit'] = true;
        $data['edit'] = Product::find($id);
        return view('crud._product_form' , $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pro = Product::find($id);
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = Str::slug($request->name).'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/') , $filename);
            $pro->image = url('uploads/'.$filename);
        }else{
            $pro->image= $pro->image;
        }

        $pro->name = $request->name;
        $pro->price = $request->price;
        $pro->slug = Str::slug($request->name);
        $pro->user_id = auth()->user()->id;
        $pro->description = $request->description;
        $pro->min_order = $request->min_order;
        $pro->max_order = $request->max_order;
        $pro->note = $request->note;

        $pro->save();

        return redirect('/product')->with('success' , 'Berhasil mengubah produk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prod = Product::find($id);
        $prod->delete();
        return redirect('/product')->with('success' , 'Berhasil menghapus produk');
    }
}
