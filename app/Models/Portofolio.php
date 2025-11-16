<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $table = 'portofolio';
    
    protected $fillable = [
        'biodata_id',
        'judul_project',
        'deskripsi', 
        'teknologi_digunakan',
        'link_demo',
        'link_github',
        'gambar_project',
        'tahun_dibuat',
        'kategori'
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodata::class);
    }
}