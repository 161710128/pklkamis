<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    protected $fillable = ['nama_lowongan','tanggal_mulai','lokasi','gaji','deskripsi_iklan','perusahaan_id'];
    public $timestamps = true;

    public function Perusahaan(){
        return $this->belongstoMany('App\Perusahaan','perusahaan_id');
    }
}
