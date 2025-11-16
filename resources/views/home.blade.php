@extends('layouts.app')

@section('content')
<div class="row">
    <!-- Profile Section -->
            <div class="col-md-4 text-center mb-4">
                @if($biodata->foto)
                    <img src="{{ asset($biodata->foto) }}" 
                        alt="Profile Photo" 
                        class="profile-img mb-3">
                @else
                    <div class="profile-img-placeholder mx-auto mb-3">
                        <i class="fas fa-user text-4xl text-gray-400"></i>
                    </div>
                @endif
                
                <h2 class="h3">{{ $biodata->nama }}</h2>
                <p class="text-muted mb-4">{{ $biodata->posisi ?? 'Web Developer' }}</p>
                
                <div class="contact-info">
                    <p class="mb-2">
                        <i class="fas fa-envelope me-2 text-pastel-purple"></i>
                        {{ $biodata->email }}
                    </p>
                    <p class="mb-2">
                        <i class="fas fa-phone me-2 text-pastel-purple"></i>
                        {{ $biodata->telepon }}
                    </p>
                    <p class="mb-3">
                        <i class="fas fa-map-marker-alt me-2 text-pastel-purple"></i>
                        {{ $biodata->alamat }}
                    </p>
                    
                    <!-- Social Media -->
                    <div class="social-links mt-3">
                        @if($biodata->linkedin)
                            <a href="{{ $biodata->linkedin }}" class="btn btn-pastel-blue btn-sm me-2 mb-2">
                                <i class="fab fa-linkedin me-1"></i> LinkedIn
                            </a>
                        @endif
                        @if($biodata->github)
                            <a href="{{ $biodata->github }}" class="btn btn-dark btn-sm me-2 mb-2">
                                <i class="fab fa-github me-1"></i> GitHub
                            </a>
                        @endif
                        @if($biodata->instagram)
                            <a href="{{ $biodata->instagram }}" class="btn btn-danger btn-sm mb-2">
                                <i class="fab fa-instagram me-1"></i> Instagram
                            </a>
                        @endif
                    </div>
                </div>
            </div>

    <!-- Content Section -->
    <div class="col-md-8">
        <!-- Ringkasan Profesional -->
        <div class="card pastel-card bg-pastel-blue mb-4">
            <div class="card-body">
                <h3 class="section-title">🎯 Ringkasan Profesional</h3>
                <p class="lead mb-0" style="font-size: 1.1rem; line-height: 1.6;">
                    {{ $biodata->ringkasan ?? 'Seorang web developer yang berdedikasi...' }}
                </p>
            </div>
        </div>

        <!-- Tentang Saya -->
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="section-title">👨‍💻 Tentang Saya</h3>
                <p style="line-height: 1.8;">{{ $biodata->tentang_saya ?? 'Deskripsi tentang diri Anda...' }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Education Preview -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="section-title">🎓 Pendidikan Terakhir</h3>
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
                        <h3 class="section-title">💼 Pengalaman Terbaru</h3>
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
        <div class="card pastel-card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="section-title mb-0">🛠️ Keahlian</h3>
                    <a href="/keahlian" class="btn btn-pastel-blue">Lihat Semua</a>
                </div>
                
                @if(isset($biodata->keahlian) && $biodata->keahlian->count() > 0)
                    <div class="row">
                        @foreach($biodata->keahlian->take(6) as $skill)
                        <div class="col-lg-4 col-md-6 mb-3">
                            <div class="skill-item p-3 rounded">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <strong class="text-dark">{{ $skill->nama_keahlian }}</strong>
                                    <span class="badge 
                                        {{ $skill->tingkat == 'pemula' ? 'bg-warning' : 
                                        ($skill->tingkat == 'menengah' ? 'bg-info' : 'bg-success') }}">
                                        {{ $skill->tingkat }}
                                    </span>
                                </div>
                                <div class="skill-bar mb-2">
                                    <div class="skill-progress 
                                        {{ $skill->tingkat == 'pemula' ? 'bg-warning' : 
                                        ($skill->tingkat == 'menengah' ? 'bg-info' : 'bg-success') }}"
                                        style="width: {{ $skill->tingkat == 'pemula' ? '33%' : ($skill->tingkat == 'menengah' ? '66%' : '100%') }}">
                                    </div>
                                </div>
                                <small class="text-muted">{{ $skill->kategori }}</small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted text-center py-3">Data keahlian belum tersedia.</p>
                @endif
            </div>
        </div>
        <!-- Sertifikasi Preview -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="section-title">🏆 Sertifikasi</h3>
                    <a href="/sertifikasi" class="btn btn-outline-primary btn-sm">Lihat Semua</a>
                </div>
                
                @if(isset($biodata->sertifikasi) && $biodata->sertifikasi->count() > 0)
                    <div class="row mt-3">
                        @foreach($biodata->sertifikasi->take(3) as $sertif)
                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <h5>{{ $sertif->nama_sertifikasi }}</h5>
                                    <p class="text-muted small">{{ $sertif->institusi_penerbit }}</p>
                                    <span class="badge bg-success">{{ $sertif->tahun_diterbit }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">Data sertifikasi belum tersedia.</p>
                @endif
            </div>
        </div>

        <!-- Portofolio Preview -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="section-title">💼 Portofolio</h3>
                    <a href="/portofolio" class="btn btn-outline-primary btn-sm">Lihat Semua</a>
                </div>
                
                @if(isset($biodata->portofolio) && $biodata->portofolio->count() > 0)
                    <div class="row mt-3">
                        @foreach($biodata->portofolio->take(2) as $project)
                        <div class="col-md-6 mb-3">
                            <div class="card h-100">
                                @if($project->gambar_project)
                                    <img src="{{ asset($project->gambar_project) }}" 
                                        class="card-img-top" 
                                        alt="{{ $project->judul_project }}" 
                                        style="height: 120px; object-fit: cover;">
                                @else
                                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                                        style="height: 120px;">
                                        <i class="fas fa-code fa-2x text-muted"></i>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <h6 class="card-title">{{ $project->judul_project }}</h6>
                                    <p class="card-text small">{{ Str::limit($project->deskripsi, 80) }}</p>
                                    <div class="d-flex justify-content-between">
                                        <span class="badge bg-info">{{ $project->tahun_dibuat }}</span>
                                        <a href="{{ $project->link_github }}" target="_blank" class="btn btn-outline-dark btn-sm">
                                            <i class="fab fa-github"></i> Code
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">Data portofolio belum tersedia.</p>
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