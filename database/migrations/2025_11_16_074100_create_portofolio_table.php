<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('portofolio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('biodata_id')->constrained()->onDelete('cascade');
            $table->string('judul_project');
            $table->text('deskripsi');
            $table->string('teknologi_digunakan'); // Laravel, Vue.js, MySQL, etc
            $table->string('link_demo')->nullable();
            $table->string('link_github');
            $table->string('gambar_project')->nullable();
            $table->year('tahun_dibuat');
            $table->enum('kategori', ['web_app', 'mobile', 'desktop', 'other']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('portofolio');
    }
};