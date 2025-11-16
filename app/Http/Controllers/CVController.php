<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\Pendidikan;
use App\Models\Pengalaman;
use App\Models\Keahlian;

class CVController extends Controller
{
    public function index()
    {
        // Ambil data biodata pertama dan load relasinya
        $biodata = Biodata::with(['pendidikan', 'pengalaman', 'keahlian'])->first();
        
        // Jika tidak ada data, kita buat data dummy untuk testing
        if (!$biodata) {
            return view('home')->with('biodata', null);
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
        $keahlian = Keahlian::all();
        return view('keahlian', compact('keahlian'));
    }
}