<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BiodataSeeder extends Seeder
{
    public function run()
    {
        // Insert biodata
        $biodataId = DB::table('biodata')->insertGetId([
            'nama' => 'Rhadisya Meila Parmanti',
            'email' => 'rhadisyamepa912@gmail.com',
            'telepon' => '+62 858-1789-6121',
            'alamat' => 'Sukabumi, Indonesia',
            'tentang_saya' => 'Saya adalah seorang web developer yang passionate dalam pengembangan aplikasi web modern menggunakan Laravel dan Vue.js. Memiliki pengalaman dalam berbagai proyek dan selalu tertarik untuk belajar teknologi terbaru.',
            'foto' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert pendidikan
        DB::table('pendidikan')->insert([
            [
                'biodata_id' => $biodataId,
                'institusi' => 'Universitas Muhammadiyah Sukabumi ',
                'jurusan' => 'Teknik Informatika',
                'tahun_mulai' => 2023,
                'tahun_selesai' => 2027,
                'deskripsi' => 'Fokus pada pengembangan web dan mobile applications. Aktif dalam organisasi mahasiswa.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'biodata_id' => $biodataId,
                'institusi' => 'SMA Negeri 1 Jampangkulon', 
                'jurusan' => 'IPA',
                'tahun_mulai' => 2020,
                'tahun_selesai' => 2023,
                'deskripsi' => 'Aktif dalam organisasi OSIS dan kegiatan ekstrakurikuler programming.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Insert pengalaman
        DB::table('pengalaman')->insert([
            [
                'biodata_id' => $biodataId,
                'jenis' => 'magang',
                'posisi' => 'Web Developer Intern',
                'perusahaan_organisasi' => 'PT. Teknologi Indonesia',
                'tahun_mulai' => 2026,
                'tahun_selesai' => 2027,
                'deskripsi' => 'Mengembangkan aplikasi web menggunakan Laravel dan Vue.js. Berkolaborasi dengan tim dalam pengembangan fitur baru.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'biodata_id' => $biodataId,
                'jenis' => 'organisasi',
                'posisi' => 'Ketua Divisi Teknologi',
                'perusahaan_organisasi' => 'Himpunan Mahasiswa Informatika',
                'tahun_mulai' => 2025,
                'tahun_selesai' => 2026,
                'deskripsi' => 'Memimpin pengembangan website organisasi dan sistem informasi. Mengelola tim developer beranggotakan 5 orang.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        

        // Insert keahlian
        DB::table('keahlian')->insert([
            [
                'biodata_id' => $biodataId,
                'nama_keahlian' => 'Laravel',
                'tingkat' => 'mahir',
                'kategori' => 'Framework',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'biodata_id' => $biodataId,
                'nama_keahlian' => 'PHP',
                'tingkat' => 'mahir', 
                'kategori' => 'Programming Language',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'biodata_id' => $biodataId,
                'nama_keahlian' => 'JavaScript',
                'tingkat' => 'menengah',
                'kategori' => 'Programming Language',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'biodata_id' => $biodataId,
                'nama_keahlian' => 'MySQL',
                'tingkat' => 'menengah', 
                'kategori' => 'Database',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}