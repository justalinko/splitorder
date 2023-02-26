<?php

namespace App\Http\Controllers;

use App\Models\SharedOrder;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index()
    {
        $data['works'] = SharedOrder::where('user_id' , auth()->user()->id)->get();
        return view('works',$data);
    }
    public function monitor()
    {
        $data['works'] = SharedOrder::where('community_id' , auth()->user()->community_id)->get();
        return view('works-monitor' , $data);
    }

    public function done($id)
    {
        $work = SharedOrder::find($id);
        $work->status = 'production_done';
        $work->note = "Produksi telah selesai";
        $work->save();

        return redirect('/works')->with('success' , 'Berhasil menyelesaikan pekerjaan');
    }

    public function delay(Request $request,$id)
    {
        $work = SharedOrder::find($id);
        $work->status = 'on_hold';
        $work->note = $request->note;
        $work->save();

        return redirect('/works')->with('success' , 'Berhasil menunda pekerjaan');
    }

    public function production($id)
    {
        $work = SharedOrder::find($id);
        $work->status = 'production';
        $work->note = "Sedang dalam proses produksi";
        $work->save();

        return redirect('/works')->with('success' , 'Berhasil memulai produksi');
    }
}
