# Sahabat Mentilin Bangka Belitung (SAMENBEL)

## Identitas tugas
- **Nama:** Muhamad Ridho Albukhori
- **NPM:** 2559201032
- **Mata kuliah:** Pemrograman Web Dasar
- **Tema:** Profil organisasi / komunitas edukasi satwa
- **Objek:** Sahabat Mentilin Bangka Belitung (SAMENBEL), organisasi fiktif untuk proyek pembelajaran.
- **Tagline:** Kenali. Hargai. Lindungi.

> Catatan: SAMENBEL adalah identitas organisasi simulasi, bukan lembaga konservasi resmi. Alamat email, akun media sosial, anggota pengurus, dan informasi wilayah kontak adalah data contoh.

## Deskripsi proyek
Website multi-halaman yang memperkenalkan mentilin, nama lokal yang digunakan masyarakat Pulau Bangka untuk Cephalopachus bancanus bancanus. Website juga mengenalkan subspesies Cephalopachus bancanus saltator yang terdapat di Pulau Belitung, serta menyampaikan contoh kegiatan edukasi dan kepedulian habitat. Konten dirancang untuk mendorong pengamatan satwa liar dari jarak aman dan tidak mendukung penangkapan, perdagangan, pemberian makan sembarangan, atau pemeliharaan satwa liar.

## Halaman
1. `index.html` — Beranda, hero, tagline, pengenalan komunitas, tiga nilai utama, dan program pilihan.
2. `tentang.html` — Profil, visi, misi, tabel pengenalan mentilin, serta tiga tokoh pengurus fiktif.
3. `katalog.html` — Enam kartu program edukasi dan konservasi.
4. `kontak.php` — Informasi kontak contoh, peta wilayah Pangkalpinang, dan formulir pesan.

Semua halaman memakai navigasi yang sama. Halaman keempat memakai PHP untuk memproses formulir; tiga halaman lain menggunakan HTML.

## Fitur dan spesifikasi teknis
- HTML5 semantik: `header`, `nav`, `main`, `section`, `article`, dan `footer`.
- Meta charset, viewport, deskripsi, serta judul berbeda pada setiap halaman.
- Satu tabel data dengan `thead` dan `tbody`.
- Semua gambar memiliki teks alternatif (`alt`) yang menjelaskan ilustrasi.
- Formulir memakai label terhubung, `required`, `type=email`, `type=tel`, pola 10–13 digit, dan batas panjang pesan.
- CSS eksternal pada `css/style.css`; menggunakan variabel warna di `:root`, Flexbox, CSS Grid, hover, transition, keyframes, dan media query.
- Tampilan mobile menggunakan menu hamburger; katalog menjadi satu kolom pada layar kecil.
- JavaScript murni dan sederhana untuk membuka/menutup menu.
- Backend formulir menggunakan PHP, PDO, prepared statements, validasi sisi server, session, dan token CSRF.
- Data pesan tersimpan ke MySQL pada tabel `pesan_kontak`.
- Ilustrasi lokal SVG dibuat khusus untuk proyek ini; tidak menggunakan template website atau framework CSS/JS.

## Struktur folder
```text
sahabat-mentilin-bangka-belitung/
├── index.html
├── tentang.html
├── katalog.html
├── kontak.php
├── kirim-pesan.php
├── config/
│   ├── .htaccess
│   └── database.php
├── database/
│   ├── .htaccess
│   └── mentilin.sql
├── css/
│   └── style.css
├── js/
│   └── script.js
├── img/
│   ├── logo-samenbel.svg
│   ├── hero-mentilin.svg
│   └── program-*.svg
├── bukti/
│   └── README.txt
├── .htaccess
├── LICENSE-NOTES.txt
└── README.md
```

## Cara menjalankan di XAMPP
1. Instal XAMPP, lalu jalankan **Apache** dan **MySQL**.
2. Ekstrak folder `sahabat-mentilin-bangka-belitung` ke direktori `htdocs`.
3. Buka `http://localhost/phpmyadmin`.
4. Pilih menu **Import**, lalu impor `database/mentilin.sql`.
5. Periksa koneksi di `config/database.php`. Konfigurasi bawaan: host `127.0.0.1`, database `mentilin_db`, user `root`, dan password kosong. Untuk konfigurasi lain, gunakan environment variables `DB_HOST`, `DB_NAME`, `DB_USER`, dan `DB_PASS`.
6. Buka `http://localhost/sahabat-mentilin-bangka-belitung/`.
7. Buka menu Kontak, isi formulir dengan data valid, lalu kirim pesan.
8. Periksa tabel `pesan_kontak` pada database `mentilin_db` melalui phpMyAdmin.

Jangan membuka file PHP lewat klik dua kali atau Live Server. Gunakan Apache melalui alamat `http://localhost/` agar PHP dapat diproses.

## Referensi konten satwa
- Randi Syafutra. (2024). **Mentilin: Si Mungil dari Pulau Seribu Kulong**. Dalam *Membingkai Satwa Primata Indonesia dalam Tiga Pilar*. Penerbit BRIN. DOI: <https://doi.org/10.55981/brin.732.c575>. Rujukan untuk nama lokal Mentilin di Pulau Bangka dan pengenalan taksonomi.
- Pusat Studi Satwa Primata, IPB University. **Tarsius bancanus**. <https://primata.ipb.ac.id/tarsius-bancanus/>. Rujukan pengenalan spesies dan subspesies.
- Universitas Bangka Belitung Repository. **Habitat dan kepadatan populasi mentilin (Cephalopachus bancanus bancanus) di Hutan Wisata Bukit Kukus, Muntok, Bangka Barat**. <https://repository.ubb.ac.id/id/eprint/3898/>. Rujukan penelitian habitat lokal.

Nama ilmiah dapat ditemukan dengan penamaan historis *Tarsius bancanus* maupun kombinasi *Cephalopachus bancanus* dalam literatur yang lebih baru. Website menyebutkan kedua bentuk tersebut agar pembaca memahami variasi penulisan.

## Sumber gambar
Seluruh ilustrasi yang digunakan di website (`img/*.svg`) merupakan **ilustrasi vektor orisinal yang dibuat untuk proyek ini**, bukan foto satwa dari situs lain. Gambar dibuat sebagai representasi edukatif, bukan foto dokumenter.

## Kendala dan cara mengatasinya
- **Halaman PHP tidak berjalan jika dibuka langsung:** jalankan Apache dari XAMPP dan akses melalui `localhost`.
- **Pesan gagal tersimpan:** pastikan MySQL aktif, database `mentilin_db` sudah diimpor, dan konfigurasi koneksi benar.
- **Menu tidak terlihat pada layar kecil:** gunakan tombol menu hamburger untuk membuka navigasi.
- **Gambar tidak tampil:** pastikan folder `img` tidak dipisahkan dari folder proyek dan nama file sesuai.

## Validasi dan bukti
File disusun mengikuti spesifikasi UTS: halaman konsisten, markup semantik, CSS eksternal, layout responsif, dan validasi formulir. Validasi W3C harus dijalankan setelah file dipasang pada lingkungan yang dapat diakses validator. Simpan screenshot hasil validasi dari empat halaman di folder `bukti/` sebelum pengumpulan. **Screenshot validator tidak dipalsukan atau dibuat sebagai bukti sebelum pemeriksaan aktual dilakukan.** Petunjuk pengambilan bukti tersedia di `bukti/README.txt`.

## Batas pengujian
Struktur file, tautan internal, keberadaan aset, dan sintaks PHP dapat diperiksa dari paket. Pengiriman formulir sampai tersimpan ke MySQL tetap perlu diuji pada komputer pengguna dengan XAMPP karena layanan database lokal tidak disertakan dalam ZIP.
