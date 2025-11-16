<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikasi extends Model
{
    use HasFactory;

    // TENTUKAN NAMA TABEL YANG BENAR
    protected $table = 'sertifikasi';
    
    protected $fillable = [
        'biodata_id',
        'nama_sertifikasi', 
        'institusi_penerbit',
        'tahun_diterbit',
        'link_sertifikasi',
        'deskripsi'
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodata::class);
    }
}