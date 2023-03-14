<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['communities'] = \App\Models\Community::all();
        return view('crud._komunitas' , $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['isEdit'] = false;
        $data['edit'] = null;
        return view('crud._komunitas_form' , $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'user_id' => 'required'
        ]);

        if($validate){
            $kom = new \App\Models\Community;
            $kom->name = $request->name;
            $kom->address = $request->address;
            $kom->user_id = $request->user_id;
            $kom->profile = $request->profile;
            $kom->save();
            
            $user = User::find($request->user_id);
            $user->community_id = $kom->id;
            $user->save();

            return redirect('/komunitas')->with('success' , 'Komunitas berhasil ditambahkan');
        }else{
            return redirect('/komunitas')->with('error' , 'Komunitas gagal ditambahkan');
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
        $data['edit'] = \App\Models\Community::find($id);
        return view('crud._komunitas_form' , $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'user_id' => 'required'
        ]);

        if($validate){
            $kom = \App\Models\Community::find($id);
            $kom->name = $request->name;
            $kom->address = $request->address;
            $kom->user_id = $request->user_id;
            $kom->profile = $request->profile;
            $kom->save();

            $user = User::find($request->user_id);
            $user->community_id = $id;
            $user->save();
            return redirect('/komunitas')->with('success' , 'Komunitas berhasil diubah');
        }else{
            return redirect('/komunitas')->with('error' , 'Komunitas gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kom = \App\Models\Community::find($id);
        $kom->delete();
        return redirect('/komunitas')->with('success' , 'Komunitas berhasil dihapus');
    }
}
