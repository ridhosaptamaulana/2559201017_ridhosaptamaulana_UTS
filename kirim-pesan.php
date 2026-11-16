<?php
declare(strict_types=1);

session_start();

function kembaliKeKontak(string $status): void
{
    header('Location: kontak.php?status=' . rawurlencode($status), true, 303);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Allow: POST');
    http_response_code(405);
    exit('Metode tidak diizinkan.');
}

$tokenForm = $_POST['csrf_token'] ?? '';
$tokenSesi = $_SESSION['csrf_token'] ?? '';
if (!is_string($tokenForm) || !is_string($tokenSesi) || $tokenSesi === '' || !hash_equals($tokenSesi, $tokenForm)) {
    kembaliKeKontak('csrf_error');
}

$ambilTeks = static function (string $kunci): string {
    $nilai = $_POST[$kunci] ?? '';
    return is_string($nilai) ? trim($nilai) : '';
};

$nama = $ambilTeks('nama');
$email = $ambilTeks('email');
$telepon = $ambilTeks('telepon');
$topik = $ambilTeks('topik');
$pesan = $ambilTeks('pesan');

$panjangNama = preg_match_all('/./us', $nama);
$panjangPesan = preg_match_all('/./us', $pesan);
$topikValid = ['edukasi', 'program', 'kolaborasi', 'lainnya'];

$valid = $panjangNama !== false
    && $panjangPesan !== false
    && $panjangNama >= 3
    && $panjangNama <= 60
    && filter_var($email, FILTER_VALIDATE_EMAIL) !== false
    && strlen($email) <= 254
    && preg_match('/^[0-9]{10,13}$/', $telepon) === 1
    && in_array($topik, $topikValid, true)
    && $panjangPesan >= 10
    && $panjangPesan <= 300;

if (!$valid) {
    kembaliKeKontak('invalid');
}

try {
    require __DIR__ . '/config/database.php';

    $sql = 'INSERT INTO pesan_kontak (nama, email, telepon, topik, pesan)
            VALUES (:nama, :email, :telepon, :topik, :pesan)';
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':nama' => $nama,
        ':email' => $email,
        ':telepon' => $telepon,
        ':topik' => $topik,
        ':pesan' => $pesan,
    ]);

    // Buat token baru setelah pengiriman sukses untuk mengurangi risiko replay.
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    kembaliKeKontak('success');
} catch (Throwable $exception) {
    error_log('SAMENBEL contact form failed: ' . $exception->getMessage());
    kembaliKeKontak('db_error');
}
