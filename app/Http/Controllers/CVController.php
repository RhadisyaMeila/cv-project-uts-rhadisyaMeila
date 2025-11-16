<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\Pendidikan;
use App\Models\Pengalaman;
use App\Models\Keahlian;
use App\Models\Sertifikasi;
use App\Models\Portofolio;

class CVController extends Controller
{
    public function index()
    {
        // PASTIKAN PAKAI with() UNTUK LOAD RELATIONSHIP
        $biodata = Biodata::with(['pendidikan', 'pengalaman', 'keahlian', 'portofolio'])->first();
        
        // Jika tidak ada data sama sekali, buat object kosong
        if (!$biodata) {
            $biodata = new \stdClass();
            $biodata->pendidikan = collect();
            $biodata->pengalaman = collect();
            $biodata->keahlian = collect();
            $biodata->portofolio = collect();
        }
        
        return view('home', compact('biodata'));
    }

    public function pendidikan()
    {
        $pendidikan = Pendidikan::all();
        return view('pendidikan', compact('pendidikan'));
    }

    public function pengalaman()
    {
        $pengalaman = Pengalaman::all();
        return view('pengalaman', compact('pengalaman'));
    }

    public function keahlian()
    {
        // PASTIKAN INI MENGGUNAKAN $keahlian
        $keahlian = Keahlian::all();
        return view('keahlian', compact('keahlian'));
    }

    public function sertifikasi()
    {
        $sertifikasi = Sertifikasi::all();
        return view('sertifikasi', compact('sertifikasi'));
    }

    public function portofolio()
    {
        $portofolio = Portofolio::all();
        return view('portofolio', compact('portofolio'));
    }
}