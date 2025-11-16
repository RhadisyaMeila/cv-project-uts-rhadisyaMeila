@extends('layouts.app')

@section('content')
<div class="row">
    <!-- Profile Section -->
    <div class="col-md-4 text-center">
        @if($biodata->foto)
            <img src="{{ asset($biodata->foto) }}" 
                alt="Profile Photo" 
                class="profile-img rounded-circle mb-3">
        @else
            <div class="profile-img rounded-circle mb-3 bg-light d-flex align-items-center justify-content-center mx-auto">
                <i class="fas fa-user fa-3x text-muted"></i>
            </div>
        @endif
        <h2>{{ $biodata->nama ?? 'Nama Lengkap' }}</h2>
        <p class="text-muted">{{ $biodata->posisi ?? 'Web Developer' }}</p>
        
        <div class="contact-info mt-4">
            <p><i class="fas fa-envelope"></i> {{ $biodata->email ?? 'email@example.com' }}</p>
            <p><i class="fas fa-phone"></i> {{ $biodata->telepon ?? '+62 812-3456-7890' }}</p>
            <p><i class="fas fa-map-marker-alt"></i> {{ $biodata->alamat ?? 'Jakarta, Indonesia' }}</p>
            
            <!-- Social Media Links - PENAMBAHAN BARU -->
            <div class="social-links mt-3">
                @if($biodata->linkedin ?? false)
                    <a href="{{ $biodata->linkedin }}" target="_blank" class="btn btn-outline-primary btn-sm me-2 mb-2">
                        <i class="fab fa-linkedin"></i> LinkedIn
                    </a>
                @endif
                @if($biodata->github ?? false)
                    <a href="{{ $biodata->github }}" target="_blank" class="btn btn-outline-dark btn-sm me-2 mb-2">
                        <i class="fab fa-github"></i> GitHub
                    </a>
                @endif
                @if($biodata->instagram ?? false)
                    <a href="{{ $biodata->instagram }}" target="_blank" class="btn btn-outline-danger btn-sm mb-2">
                        <i class="fab fa-instagram"></i> Instagram
                    </a>
                @endif
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="col-md-8">
        <!-- Ringkasan Profesional - PENAMBAHAN BARU -->
        <div class="card mb-4 bg-light border-0">
            <div class="card-body">
                <h3 class="section-title">🎯 Ringkasan Profesional</h3>
                <p class="lead" style="font-size: 1.1rem; line-height: 1.6;">
                    {{ $biodata->ringkasan ?? 'Seorang web developer yang berdedikasi dengan pengalaman dalam pengembangan aplikasi web modern. Memiliki keahlian dalam Laravel, PHP, dan JavaScript dengan passion untuk menciptakan solusi digital yang inovatif dan efisien.' }}
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
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="section-title">🛠️ Keahlian</h3>
                    <a href="/keahlian" class="btn btn-outline-primary btn-sm">Lihat Semua</a>
                </div>
                
                @if(isset($biodata->keahlian) && $biodata->keahlian->count() > 0)
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