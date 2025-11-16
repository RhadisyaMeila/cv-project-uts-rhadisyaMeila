@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="section-title">🛠️ Keahlian</h1>
        
        @if($keahlian->count() > 0)
            <div class="row">
                @foreach($keahlian as $skill)
                <div class="col-md-6 mb-4">
                    <div class="card pastel-card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0 text-dark">{{ $skill->nama_keahlian }}</h5>
                                <span class="badge 
                                    {{ $skill->tingkat == 'pemula' ? 'bg-warning' : 
                                       ($skill->tingkat == 'menengah' ? 'bg-info' : 'bg-success') }}">
                                    {{ $skill->tingkat }}
                                </span>
                            </div>
                            
                            <div class="skill-bar mb-3">
                                <div class="skill-progress 
                                    {{ $skill->tingkat == 'pemula' ? 'bg-warning' : 
                                       ($skill->tingkat == 'menengah' ? 'bg-info' : 'bg-success') }}"
                                    style="width: {{ $skill->tingkat == 'pemula' ? '33%' : ($skill->tingkat == 'menengah' ? '66%' : '100%') }}">
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">{{ $skill->kategori }}</small>
                                <div class="skill-level">
                                    <!-- Bintang 1 - SELALU MENYALA untuk semua tingkat -->
                                    <i class="fas fa-star text-warning"></i>
                                    
                                    <!-- Bintang 2 - Menyala untuk menengah dan mahir -->
                                    <i class="fas fa-star {{ $skill->tingkat == 'pemula' ? 'text-muted' : 'text-warning' }}"></i>
                                    
                                    <!-- Bintang 3 - Hanya menyala untuk mahir -->
                                    <i class="fas fa-star {{ $skill->tingkat == 'mahir' ? 'text-warning' : 'text-muted' }}"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>Data keahlian belum tersedia.
            </div>
        @endif
        
        <div class="text-center mt-4">
            <a href="/" class="btn btn-pastel-blue btn-lg">
                <i class="fas fa-arrow-left me-2"></i>Kembali ke Home
            </a>
        </div>
    </div>
</div>

<style>
.skill-level i {
    margin: 0 2px;
    font-size: 0.9em;
}
</style>
@endsection