<?php
declare(strict_types=1);
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$status = isset($_GET['status']) && is_string($_GET['status']) ? $_GET['status'] : ''; 
$statusMessages = [
    'success' => ['class' => 'success', 'text' => 'Pesan berhasil disimpan. Terima kasih sudah menghubungi SAMENBEL.'],
    'invalid' => ['class' => 'error', 'text' => 'Ada data yang belum sesuai. Silakan periksa kembali formulir.'],
    'db_error' => ['class' => 'error', 'text' => 'Pesan belum dapat disimpan. Periksa koneksi database atau coba lagi.'],
    'csrf_error' => ['class' => 'error', 'text' => 'Sesi formulir berakhir. Muat ulang halaman lalu kirim kembali.'],
];
$notice = $statusMessages[$status] ?? null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Hubungi Sahabat Mentilin Bangka Belitung untuk edukasi dan kolaborasi konservasi.">
  <title>Kontak | Sahabat Mentilin Bangka Belitung</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js" defer></script>
</head>
<body>
<header class="site-header"><div class="container header-inner"><a class="brand" href="index.html"><img src="logo-samenbel.svg" alt="Logo Sahabat Mentilin Bangka Belitung"><span><strong>SAMENBEL</strong><small>Sahabat Mentilin Bangka Belitung</small></span></a><button class="menu-toggle" type="button" aria-label="Buka navigasi" aria-expanded="false">☰</button><nav class="main-nav" aria-label="Navigasi utama"><a class="" href="index.html">Beranda</a><a class="" href="tentang.html">Tentang</a><a class="" href="katalog.html">Katalog</a><a class="active" href="kontak.php">Kontak</a></nav></div></header>
<main>
<section class="page-hero container"><p class="eyebrow">KONTAK</p><h1>Mari bertukar pengetahuan.</h1><p class="hero-lead">Punya pertanyaan atau ingin mengenal program edukasi SAMENBEL? Sampaikan pertanyaan atau ajakan kolaborasi melalui formulir berikut.</p></section>
<section class="section container contact-grid"><div class="contact-details"><p class="eyebrow">INFORMASI ORGANISASI</p><h2>Temukan SAMENBEL.</h2><p class="muted">Silakan hubungi kami untuk bertanya tentang materi edukasi, program komunitas, atau peluang kolaborasi.</p><div class="contact-detail"><span>Email contoh</span><a href="mailto:halo@sahabatmentilin.example">halo@sahabatmentilin.example</a></div><div class="contact-detail"><span>Media sosial contoh</span><p>@sahabatmentilin.babel</p></div><div class="contact-detail"><span>Wilayah kegiatan</span><p>Pangkalpinang dan wilayah Kepulauan Bangka Belitung, Indonesia</p></div><div class="map-panel"><iframe title="Peta wilayah Pangkalpinang, Kepulauan Bangka Belitung" src="https://maps.google.com/maps?q=Pangkalpinang%2C%20Bangka%20Belitung&t=&z=12&ie=UTF8&iwloc=&output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div><p class="source-note">Peta menunjukkan wilayah umum dalam konsep organisasi. Alamat dan akun kontak merupakan data contoh.</p></div>
<div class="form-panel"><p class="eyebrow">FORMULIR PESAN</p><h2>Kirim pesan</h2><p class="muted form-intro">Pesan akan disimpan ke database lokal setelah formulir berhasil dikirim.</p><?php if ($notice): ?><p class="form-alert <?= htmlspecialchars($notice['class'], ENT_QUOTES, 'UTF-8') ?>" role="status" aria-live="polite"><?= htmlspecialchars($notice['text'], ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?><form id="contact-form" action="kirim-pesan.php" method="post"><input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>"><div class="form-field"><label for="nama">Nama lengkap</label><input id="nama" name="nama" type="text" autocomplete="name" required minlength="3" maxlength="60" placeholder="Nama kamu"></div><div class="form-field"><label for="email">Alamat email</label><input id="email" name="email" type="email" autocomplete="email" maxlength="254" required placeholder="nama@email.com"></div><div class="form-field"><label for="telepon">Nomor HP</label><input id="telepon" name="telepon" type="tel" autocomplete="tel" inputmode="numeric" maxlength="13" pattern="[0-9]{10,13}" required placeholder="081234567890" title="Masukkan 10 sampai 13 digit angka tanpa spasi"></div><div class="form-field"><label for="topik">Topik pesan</label><select id="topik" name="topik" required><option value="">Pilih topik</option><option value="edukasi">Informasi edukasi</option><option value="program">Program kegiatan</option><option value="kolaborasi">Kolaborasi komunitas</option><option value="lainnya">Lainnya</option></select></div><div class="form-field"><label for="pesan">Pesan</label><textarea id="pesan" name="pesan" minlength="10" maxlength="300" rows="5" required placeholder="Tulis pesan minimal 10 karakter..."></textarea><small>Minimal 10 dan maksimal 300 karakter.</small></div><button class="button button-primary" type="submit">Kirim pesan</button></form></div></section>
</main>
<footer class="site-footer"><div class="container footer-inner"><div><a class="footer-brand" href="index.html">SAMENBEL</a><p>Kenali. Hargai. Lindungi.</p></div><p class="footer-note">© 2026 Sahabat Mentilin Bangka Belitung · Kenali. Hargai. Lindungi.</p></div></footer>
</body>
</html>
