@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="section-title">🏆 Sertifikasi & Penghargaan</h1>
        
        @if($sertifikasi->count() > 0)
            @foreach($sertifikasi as $sertif)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>{{ $sertif->nama_sertifikasi }}</h4>
                            <p class="text-muted">
                                <strong>{{ $sertif->institusi_penerbit }}</strong> • 
                                Tahun {{ $sertif->tahun_diterbit }}
                            </p>
                            
                            @if($sertif->deskripsi)
                                <p>{{ $sertif->deskripsi }}</p>
                            @endif
                        </div>
                        <div class="col-md-4 text-end">
                            @if($sertif->link_sertifikasi)
                                <a href="{{ $sertif->link_sertifikasi }}" target="_blank" 
                                   class="btn btn-outline-primary btn-sm">
                                    📄 Lihat Sertifikasi
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="alert alert-info">
                Data sertifikasi belum tersedia.
            </div>
        @endif
        
        <a href="/" class="btn btn-primary">Kembali ke Home</a>
    </div>
</div>
@endsection