<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $fillable = ['nama_perusahaan','logo','deskripsi','kategori','subkategori','judul','gaji','tanggal_mulai','email','telepon','user_id'];
    public $timestamps = true;

    public function User(){
        return $this->belongsto('App\User','user_id');
    }
    public function Lowongan(){
        return $this->HasOne('App\Lowongan','perusahaan_id');
    }
}
