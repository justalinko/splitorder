<?php

namespace App\Http\Controllers\CRUD;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['posts'] = \App\Models\Post::all();
        return view('crud._post' , $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['isEdit'] = false;
        $data['edit'] = null;
        return view('crud._post_form' , $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'content' => 'required',
         
        ]);

        if($validate){
            $post = new \App\Models\Post;
            $post->title = $request->title;
            $post->content = $request->content;
            $post->author = $request->author;
            $post->slug = Str::slug($request->title);
            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = $post->slug.time() . '.' . $extension;
                $file->move(public_path('uploads/') , $filename);
                $post->image =url('uploads/'.$filename);
            }else{
                $post->image = "https://via.placeholder.com/250x100?text=".$post->title;
            }
            $post->save();
            return redirect('/post')->with('success' , 'Postingan berhasil ditambahkan');
        }else{
            return redirect('/post')->with('error' , 'Postingan gagal ditambahkan');
        }
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
        $data['edit'] = \App\Models\Post::find($id);
        return view('crud._post_form' , $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'title' => 'required',
            'content' => 'required',
         
        ]);

        if($validate){
            $post = \App\Models\Post::find($id);
            $post->title = $request->title;
            $post->content = $request->content;
            $post->author = $request->author;
            $post->slug = Str::slug($request->title);
            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = $post->slug.time() . '.' . $extension;
                $file->move(public_path('uploads/') , $filename);
                $post->image =url('uploads/'.$filename);
            }
            $post->save();
            return redirect('/post')->with('success' , 'Postingan berhasil diubah');
        }else{
            return redirect('/post')->with('error' , 'Postingan gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ex = \App\Models\Post::find($id);
        $ex->delete();
        return redirect('/post')->with('success', 'Postingan berhasil dihapus!');
    }
}
