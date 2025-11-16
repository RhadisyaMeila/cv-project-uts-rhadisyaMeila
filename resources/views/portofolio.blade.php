@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="section-title">💼 Portofolio</h1>
        <p class="lead">Kumpulan project dan karya yang telah saya kembangkan.</p>
        
        @if($portofolio->count() > 0)
            <div class="row">
                @foreach($portofolio as $project)
                <div class="col-md-6 mb-4">
                    <div class="card h-100 project-card">
                        @if($project->gambar_project)
                            <img src="{{ asset($project->gambar_project) }}" 
                                class="card-img-top" 
                                alt="{{ $project->judul_project }}" 
                                style="height: 200px; object-fit: cover;">
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                                style="height: 200px;">
                                <i class="fas fa-code fa-3x text-muted"></i>
                            </div>
                        @endif
                        
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->judul_project }}</h5>
                            <p class="card-text">{{ $project->deskripsi }}</p>
                            
                            <div class="mb-2">
                                @foreach(explode(',', $project->teknologi_digunakan) as $tech)
                                    <span class="badge bg-primary me-1">{{ trim($tech) }}</span>
                                @endforeach
                            </div>
                            
                            <div class="project-links">
                                @if($project->link_demo)
                                    <a href="{{ $project->link_demo }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-external-link-alt"></i> Demo
                                    </a>
                                @endif
                                <a href="{{ $project->link_github }}" target="_blank" class="btn btn-outline-dark btn-sm">
                                    <i class="fab fa-github"></i> GitHub
                                </a>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">
                                <i class="fas fa-calendar"></i> {{ $project->tahun_dibuat }} • 
                                <i class="fas fa-tag"></i> {{ ucfirst($project->kategori) }}
                            </small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i> Data portofolio belum tersedia.
            </div>
        @endif
        
        <a href="/" class="btn btn-primary mt-3">Kembali ke Home</a>
    </div>
</div>
@endsection