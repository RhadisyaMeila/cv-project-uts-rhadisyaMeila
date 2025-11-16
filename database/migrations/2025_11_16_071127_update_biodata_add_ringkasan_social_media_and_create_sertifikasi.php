<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Tambah kolom ke biodata JIKA BELUM ADA
        if (Schema::hasTable('biodata')) {
            Schema::table('biodata', function (Blueprint $table) {
                if (!Schema::hasColumn('biodata', 'ringkasan')) {
                    $table->text('ringkasan')->after('tentang_saya')->nullable();
                }
                if (!Schema::hasColumn('biodata', 'linkedin')) {
                    $table->string('linkedin')->after('telepon')->nullable();
                }
                if (!Schema::hasColumn('biodata', 'github')) {
                    $table->string('github')->after('linkedin')->nullable();
                }
                if (!Schema::hasColumn('biodata', 'instagram')) {
                    $table->string('instagram')->after('github')->nullable();
                }
            });
        }

        // Buat tabel sertifikasi JIKA BELUM ADA
        if (!Schema::hasTable('sertifikasi')) {
            Schema::create('sertifikasi', function (Blueprint $table) {
                $table->id();
                $table->foreignId('biodata_id')->constrained()->onDelete('cascade');
                $table->string('nama_sertifikasi');
                $table->string('institusi_penerbit');
                $table->year('tahun_diterbit');
                $table->string('link_sertifikasi')->nullable();
                $table->text('deskripsi')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        // Hapus kolom dari biodata
        Schema::table('biodata', function (Blueprint $table) {
            $table->dropColumn(['ringkasan', 'linkedin', 'github', 'instagram']);
        });

        // Hapus tabel sertifikasi
        Schema::dropIfExists('sertifikasi');
    }
};