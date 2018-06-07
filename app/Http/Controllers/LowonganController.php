<?php

namespace App\Http\Controllers;

use App\Lowongan;
use App\Perusahaan;
use Session;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lowongan = Lowongan::with('Perusahaan')->get();
        return view('lowongan.index',compact('lowongan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perusahaan = Perusahaan::all();
        return view('lowongan.create',compact('perusahaan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_lowongan' => 'required|',
            'tanggal_mulai' => 'required|',
            'lokasi' => 'required|',
            'gaji' => 'required|',
            'deskripsi_iklan' => 'required|',
            'perusahaan_id' => 'required'
        ]);
        $lowongan = new Lowongan;
        $lowongan->nama_lowongan = $request->nama_lowongan;
        $lowongan->tanggal_mulai = $request->tanggal_mulai;
        $lowongan->lokasi = $request->lokasi;
        $lowongan->gaji = $request->gaji;
        $lowongan->deskripsi_iklan = $request->deskripsi_iklan;
        $lowongan->perusahaan_id = $request->perusahaan_id;
        $lowongan->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$lowongan->deskripsi</b>"
        ]);
        return redirect()->route('lowongan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function show(Lowongan $lowongan)
    {
        $lowongan= Lowongan::findOrFail($id);
        return view('lowongan.show',compact('lowongan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function edit(Lowongan $lowongan)
    {
        $lowongan = Lowongan::findOrFail($id);
        $perusahaan = Perusahaan::all();
        $selectedp = Lowongan::findOrFail($id)->low_id;
        return view('member.edit',compact('perusahaan','    lowongan','selectedp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lowongan $lowongan)
    
        {$this->validate($request,[
            'nama_lowongan' => 'required|',
            'tanggal_mulai' => 'required|',
            'lokasi' => 'required|',
            'gaji' => 'required|',
            'deskripsi_iklan' => 'required|',
            'perusahaan_id' => 'required'
        ]);
        $lowongan = Lowongan::findOrFail($id);
        $lowongan->nama_lowongan = $request->nama_lowongan;
        $lowongan->tanggal_mulai = $request->tanggal_mulai;
        $lowongan->lokasi = $request->lokasi;
        $lowongan->gaji = $request->gaji;
        $lowongan->deskripsi_iklan = $request->deskripsi_iklan;
        $lowongan->perusahaan_id = $request->perusahaan_id;
        $lowongan->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$lowongan->nama_lowongan</b>"
        ]);
        return redirect()->route('lowongan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lowongan $lowongan)
    {
        $lowongan = Lowongan::findOrFail($id);
        $lowongan->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('lowongan.index');
    }
}

