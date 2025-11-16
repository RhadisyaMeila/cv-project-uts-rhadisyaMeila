@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="section-title">Keahlian</h1>
        
        @if($keahlian->count() > 0)
            <div class="row">
                @foreach($keahlian as $skill)
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5>{{ $skill->nama_keahlian }}</h5>
                            <p class="text-muted">{{ $skill->kategori }}</p>
                            
                            @php
                                $tingkatClass = [
                                    'pemula' => 'bg-warning',
                                    'menengah' => 'bg-info', 
                                    'mahir' => 'bg-success'
                                ];
                            @endphp
                            
                            <div class="progress mb-2">
                                <div class="progress-bar {{ $tingkatClass[$skill->tingkat] ?? 'bg-secondary' }}" 
                                     style="width: {{ $skill->tingkat == 'pemula' ? '33%' : ($skill->tingkat == 'menengah' ? '66%' : '100%') }}">
                                    {{ ucfirst($skill->tingkat) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">
                Data keahlian belum tersedia.
            </div>
        @endif
        
        <a href="/" class="btn btn-primary mt-3">Kembali ke Home</a>
    </div>
</div>
@endsection