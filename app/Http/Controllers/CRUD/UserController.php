<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['users'] = \App\Models\User::all();
        return view('crud._user' , $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['isEdit'] = false;
        $data['edit'] = null;
        return view('crud._user_form' , $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|same:confirm_password',
            'level' => 'required',
            'phone' => 'required'
        ]);
        

        if($validate){
            $ex = new \App\Models\User;
            $ex->name = $request->name;
            $ex->email = $request->email;
            $ex->password = bcrypt($request->password);
            $ex->level = $request->level;
            $ex->phone = $request->phone;
            if($request->community_id != 'none'){
            $ex->community_id = $request->community_id;
            }
            $ex->max_production = $request->max_production;
            $ex->address = $request->address;
            $ex->save();
            return redirect('/anggota')->with('success', 'Data berhasil ditambahkan!');
        }else{
            return redirect('/anggota')->with('error', 'Data gagal ditambahkan!');
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
        $data['edit'] = \App\Models\User::find($id);
        return view('crud._user_form' , $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'level' => 'required',
            'phone' => 'required'
        ]);
        

        if($validate){
            $ex = \App\Models\User::find($id);
            $ex->name = $request->name;
            $ex->email = $request->email;
            $ex->level = $request->level;
            $ex->phone = $request->phone;
            $ex->community_id = $request->community_id;
            $ex->max_production = $request->max_production;
            $ex->address = $request->address;
            if($request->password != null){
                $ex->password = bcrypt($request->password);
            }

            $ex->save();
            return redirect('/anggota')->with('success', 'Data berhasil diubah!');
        }else{
            return redirect('/anggota')->with('error', 'Data gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ex = \App\Models\User::find($id);
        $ex->delete();
        return redirect('/anggota')->with('success', 'Data berhasil dihapus!');
    }
}
