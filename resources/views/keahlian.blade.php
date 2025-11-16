@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="section-title">Keahlian</h1>
        
        @php
            // Group keahlian by kategori
            $kategories = $keahlian->groupBy('kategori');
        @endphp
        
        @if($keahlian->count() > 0)
            @foreach($kategories as $kategori => $skills)
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">{{ $kategori }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($skills as $skill)
                        <div class="col-md-6 mb-3">
                            <div class="skill-item">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <strong>{{ $skill->nama_keahlian }}</strong>
                                    <span class="badge bg-{{ $skill->tingkat == 'pemula' ? 'warning' : ($skill->tingkat == 'menengah' ? 'info' : 'success') }} text-capitalize">
                                        {{ $skill->tingkat }}
                                    </span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-{{ $skill->tingkat == 'pemula' ? 'warning' : ($skill->tingkat == 'menengah' ? 'info' : 'success') }}" 
                                         style="width: {{ $skill->tingkat == 'pemula' ? '33%' : ($skill->tingkat == 'menengah' ? '66%' : '100%') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="alert alert-info">
                Data keahlian belum tersedia.
            </div>
        @endif
        
        <a href="/" class="btn btn-primary">Kembali ke Home</a>
    </div>
</div>
@endsection