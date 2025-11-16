@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="section-title">Pengalaman</h1>
        
        @if($pengalaman->count() > 0)
            @foreach($pengalaman as $exp)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>{{ $exp->posisi }}</h4>
                            <h5 class="text-primary">{{ $exp->perusahaan_organisasi }}</h5>
                            <span class="badge bg-{{ $exp->jenis == 'magang' ? 'info' : ($exp->jenis == 'organisasi' ? 'success' : 'warning') }}">
                                {{ ucfirst($exp->jenis) }}
                            </span>
                            <p class="text-muted mt-2">
                                {{ $exp->tahun_mulai }} - {{ $exp->tahun_selesai }}
                            </p>
                            @if($exp->deskripsi)
                                <p>{{ $exp->deskripsi }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="alert alert-info">
                Data pengalaman belum tersedia.
            </div>
        @endif
        
        <a href="/" class="btn btn-primary">Kembali ke Home</a>
    </div>
</div>
@endsection