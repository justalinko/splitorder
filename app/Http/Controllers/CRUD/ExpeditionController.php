<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use App\Models\Expedition;
use Illuminate\Http\Request;

class ExpeditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['expeditions'] = Expedition::all();
        return view('crud._ekspedisi' , $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['isEdit'] = false;
        $data['edit'] = null;
        return view('crud._ekspedisi_form' , $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ex = new Expedition();
        $ex->name = $request->name;
        $ex->phone = $request->phone;
        $ex->address = $request->address;
        $ex->status = 'available';

        $ex->save();

        return redirect('/ekspedisi')->with('success' , 'Berhasil menambah ekspedisi');
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
        $data['edit'] = \App\Models\Expedition::find($id);
        return view('crud._ekspedisi_form' , $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ex = \App\Models\Expedition::find($id);
        $ex->delete();
        return redirect('/ekspedisi')->with('success' , 'Ekspedisi berhasil dihapus');
    }
}
