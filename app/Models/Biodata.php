<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $table = 'biodata';
    
    protected $fillable = [
        'nama', 'email', 'telepon', 'alamat', 'tentang_saya', 'foto', 'ringkasan', 'linkedin', 'github', 'instagram'
    ];

    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class);
    }

    public function pengalaman()
    {
        return $this->hasMany(Pengalaman::class);
    }

    public function keahlian()
    {
        return $this->hasMany(Keahlian::class);
    }

    public function sertifikasi()
    {
        return $this->hasMany(Sertifikasi::class);
    }
    public function portofolio()
    {
        return $this->hasMany(Portofolio::class);
    }
}