@extends('layouts.app')

@section('content')
<div class="row">
    <!-- Profile Section -->
    <div class="col-md-4 text-center">
        <img src="{{ $biodata->foto ?? '/images/default-profile.jpg' }}" 
             alt="Profile Photo" 
             class="profile-img rounded-circle mb-3">
        <h2>{{ $biodata->nama ?? 'Nama Lengkap' }}</h2>
        <p class="text-muted">{{ $biodata->posisi ?? 'Web Developer' }}</p>
        
        <div class="contact-info mt-4">
            <p><i class="fas fa-envelope"></i> {{ $biodata->email ?? 'email@example.com' }}</p>
            <p><i class="fas fa-phone"></i> {{ $biodata->telepon ?? '+62 812-3456-7890' }}</p>
            <p><i class="fas fa-map-marker-alt"></i> {{ $biodata->alamat ?? 'Jakarta, Indonesia' }}</p>
        </div>
    </div>

    <!-- Content Section -->
    <div class="col-md-8">
        <!-- Tentang Saya -->
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="section-title">Tentang Saya</h3>
                <p>{{ $biodata->tentang_saya ?? 'Deskripsi tentang diri Anda...' }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Education Preview -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="section-title">Pendidikan Terakhir</h3>
                        @php
                            $latestEducation = $biodata->pendidikan->sortByDesc('tahun_selesai')->first() ?? null;
                        @endphp
                        @if($latestEducation)
                            <h5>{{ $latestEducation->institusi }}</h5>
                            <p class="text-muted">{{ $latestEducation->jurusan }} ({{ $latestEducation->tahun_mulai }} - {{ $latestEducation->tahun_selesai }})</p>
                            <p class="small">{{ Str::limit($latestEducation->deskripsi, 80) }}</p>
                        @else
                            <p>Data pendidikan belum tersedia.</p>
                        @endif
                        <a href="/pendidikan" class="btn btn-outline-primary btn-sm">Lihat Semua</a>
                    </div>
                </div>
            </div>

            <!-- Experience Preview -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="section-title">Pengalaman Terbaru</h3>
                        @php
                            $latestExperience = $biodata->pengalaman->sortByDesc('tahun_selesai')->first() ?? null;
                        @endphp
                        @if($latestExperience)
                            <h5>{{ $latestExperience->posisi }}</h5>
                            <p class="text-muted">{{ $latestExperience->perusahaan_organisasi }}</p>
                            <span class="badge bg-info mb-2">{{ ucfirst($latestExperience->jenis) }}</span>
                            <p class="small">{{ Str::limit($latestExperience->deskripsi, 80) }}</p>
                        @else
                            <p>Data pengalaman belum tersedia.</p>
                        @endif
                        <a href="/pengalaman" class="btn btn-outline-primary btn-sm">Lihat Semua</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Skills Preview -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="section-title">Keahlian</h3>
                    <a href="/keahlian" class="btn btn-outline-primary btn-sm">Lihat Semua</a>
                </div>
                
                @if($biodata->keahlian->count() > 0)
                    <div class="row mt-3">
                        @foreach($biodata->keahlian->take(6) as $skill)
                        <div class="col-md-4 mb-3">
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
                                <small class="text-muted">{{ $skill->kategori }}</small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">Data keahlian belum tersedia.</p>
                @endif
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="row text-center">
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h4>{{ $biodata->pendidikan->count() }}</h4>
                        <p>Pendidikan</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h4>{{ $biodata->pengalaman->count() }}</h4>
                        <p>Pengalaman</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h4>{{ $biodata->keahlian->count() }}</h4>
                        <p>Keahlian</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <h4>{{ now()->year - 2020 }}</h4>
                        <p>Tahun Pengalaman</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection