<?php

namespace App\Http\Controllers;
use App\User;
use App\Perusahaan;
use Illuminate\Http\Request;
use Session;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perusahaan = Perusahaan::with('user')->get();
        return view('perusahaan.index',compact('perusahaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('perusahaan.create',compact('user'));
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
            'nama_perusahaan' => 'required|',
            'logo' => 'required|',
            'deskripsi' => 'required|max:255',
            'kategori' => 'required|max:115',
            'subkategori' => 'required|max:115',
            'judul' => 'required|max:50',
            'gaji' => 'required|required',
            'tanggal_mulai' => 'required|',
            'email' => 'required|unique:perusahaans',
            'telepon' => 'required|',
            'user_id' => 'required|',
        ]);
        $perusahaan = new Perusahaan;
        $perusahaan->nama_perusahaan = $request->nama_perusahaan;
        $perusahaan->logo = $request->logo;
        $perusahaan->deskripsi = $request->deskripsi;
        $perusahaan->kategori = $request->kategori;
        $perusahaan->subkategori = $request->subkategori;
        $perusahaan->judul = $request->judul;
        $perusahaan->gaji = $request->gaji;
        $perusahaan->tanggal_mulai = $request->tanggal_mulai;
        $perusahaan->email = $request->email;
        $perusahaan->telepon = $request->telepon;
        $perusahaan->user_id = $request->user_id;
        
        $perusahaan->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$perusahaan->logo</b>"
        ]);
        return redirect()->route('perusahaan.index');

        
        {
            //upload
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $destinationPath = public_path (). '/assests/admin/images/lokerr/';
                $filename = str_random(6).'_'.$file->getClientOriginalName();
                $uploadSucess = $file->move($destinationPath, $filename);
                $perusahaan->logo = $filename;
                $perusahaan->save();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function show(Perusahaan $id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        return view('perusahaan.show',compact('perusahaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $user = User::all();
        $selectedus = Perusahaan::findOrFail($id)->user_id;
        // dd($selected);
        return view('perusahaan.edit',compact('perusahaan','user','selectedus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nama_perusahaan' => 'required|',
            'logo' => 'required|',
            'deskripsi' => 'required|max:255',
            'kategori' => 'required|max:115',
            'subkategori' => 'required|max:115',
            'judul' => 'required|max:50',
            'gaji' => 'required|',
            'tanggal_mulai' => 'required|',
            'email' => 'required|',
            'telepon' => 'required|',
            'user_id' => 'required|'
        ]);
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->nama_perusahaan = $request->nama_perusahaan;
        $perusahaan->logo = $request->logo;
        $perusahaan->deskripsi = $request->deskripsi;
        $perusahaan->kategori = $request->kategori;
        $perusahaan->subkategori = $request->subkategori;
        $perusahaan->judul = $request->judul;
        $perusahaan->gaji = $request->gaji;
        $perusahaan->tanggal_mulai = $request->tanggal_mulai;
        $perusahaan->email = $request->email;
        $perusahaan->telepon = $request->telepon;
        $perusahaan->user_id = $request->user_id;
        $perusahaan->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$perusahaan->logo</b>"
        ]);
        return redirect()->route('perusahaan.index');
            //ngedit foto
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $destinationPath = public_path (). '/assests/admin/images/lokerr';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSucess = $file->move($destinationPath, $filename);
            
            // hapus foto lama
            if ($perusahaan->logo) {
                $old_foto =$perusahaan-$logo;
                $filepath = public_path() . DIRECTORY_SEPARATOR . '/assets/admin/images/lokerr'
                . DIRECTORY_SEPARATOR . $perusahaan->logo;
                try{
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    
                }
            }
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('perusahaan.index');
    }
}
