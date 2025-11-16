@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="section-title">Riwayat Pendidikan</h1>
        
        @if($pendidikan->count() > 0)
            @foreach($pendidikan as $edu)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>{{ $edu->institusi }}</h4>
                            <h5 class="text-primary">{{ $edu->jurusan }}</h5>
                            <p class="text-muted">
                                {{ $edu->tahun_mulai }} - {{ $edu->tahun_selesai }}
                            </p>
                            @if($edu->deskripsi)
                                <p>{{ $edu->deskripsi }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="alert alert-info">
                Data pendidikan belum tersedia.
            </div>
        @endif
        
        <a href="/" class="btn btn-primary">Kembali ke Home</a>
    </div>
</div>
@endsection