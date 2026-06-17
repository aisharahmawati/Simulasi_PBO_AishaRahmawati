<?php
// File: index.php

// 1. Import semua file dependensi dengan path absolut (__DIR__) dan nama file yang presisi
require_once __DIR__ . '/koneksi.php';
require_once __DIR__ . '/Pendaftaran.php';
require_once __DIR__ . '/PendaftaranReguler.php';
require_once __DIR__ . '/PendaftaranPrestasi.php';
require_once __DIR__ . '/PendaftaranKedinasan.php';

// 2. Inisialisasi koneksi database
$database = new Koneksi();
$db = $database->hubungkan();

// 3. Tangkap pilihan jalur dari pendaftar (Default: 'Reguler')
$jalurPilihan = isset($_GET['jalur']) ? $_GET['jalur'] : 'Reguler';

// 4. Ambil data dari database dan bungkus ke dalam Objek sesuai jalur pilihan pendaftar
$daftarObjekPendaftaran = [];

if ($jalurPilihan === 'Reguler') {
    // Memanggil metode query spesifik Tahap 4
    $dataMentah = PendaftaranReguler::getDaftarReguler($db);
    foreach ($dataMentah as $row) {
        // Proses instansiasi objek konkrit (Polimorfisme)
        $daftarObjekPendaftaran[] = new PendaftaranReguler($row);
    }
} elseif ($jalurPilihan === 'Prestasi') {
    $dataMentah = PendaftaranPrestasi::getDaftarPrestasi($db);
    foreach ($dataMentah as $row) {
        $daftarObjekPendaftaran[] = new PendaftaranPrestasi($row);
    }
} elseif ($jalurPilihan === 'Kedinasan') {
    $dataMentah = PendaftaranKedinasan::getDaftarKedinasan($db);
    foreach ($dataMentah as $row) {
        $daftarObjekPendaftaran[] = new PendaftaranKedinasan($row);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulasi PBO - Sistem Pendaftaran Mahasiswa Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card-header { font-weight: bold; }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">Sistem Informasi Pendaftaran PMB</h1>
        <p class="text-muted">Aplikasi Simulasi PBO - Single Table Inheritance & Polimorfisme</p>
        <span class="badge bg-primary px-3 py-2">Oleh: Aisha Rahmawati (TI-1C)</span>
    </div>

    <div class="card mb-4 shadow-sm">
        <div class="card-body d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
                <h5 class="card-title mb-1 fw-semibold">Pilih Jalur Pendaftaran</h5>
                <p class="card-text text-muted small mb-0">Silakan pilih jalur untuk menampilkan data spesifik beserta kalkulasi biayanya.</p>
            </div>
            <div>
                <form method="GET" action="" class="d-flex gap-2">
                    <select name="jalur" class="form-select form-select-lg fw-bold border-primary" onchange="this.form.submit()" style="width: 250px;">
                        <option value="Reguler" <?php echo $jalurPilihan == 'Reguler' ? 'selected' : ''; ?>>Jalur Reguler</option>
                        <option value="Prestasi" <?php echo $jalurPilihan == 'Prestasi' ? 'selected' : ''; ?>>Jalur Prestasi</option>
                        <option value="Kedinasan" <?php echo $jalurPilihan == 'Kedinasan' ? 'selected' : ''; ?>>Jalur Kedinasan</option>
                    </select>
                </form>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <span>Daftar Calon Mahasiswa - <?php echo htmlspecialchars($jalurPilihan); ?></span>
            <span class="badge bg-light text-dark"><?php echo count($daftarObjekPendaftaran); ?> Data Ditemukan</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 align-middle">
                    <thead class="table-secondary">
                        <tr>
                            <th class="text-center" style="width: 5%;">No</th>
                            <th>Nama Calon</th>
                            <th>Asal Sekolah</th>
                            <th class="text-center">Nilai Ujian</th>
                            <th>Biaya Dasar</th>
                            <th>Informasi Karakteristik Jalur (Atribut Unik)</th>
                            <th>Total Biaya Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($daftarObjekPendaftaran)): ?>
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">Tidak ada data pendaftaran untuk jalur ini.</td>
                            </tr>
                        <?php else: ?>
                            <?php $no = 1; ?>
                            <?php foreach ($daftarObjekPendaftaran as $pendaftar): ?>
                                <tr>
                                    <td class="text-center font-monospace"><?php echo $no++; ?></td>
                                    <td class="fw-semibold text-primary"><?php echo htmlspecialchars($pendaftar->getNamaCalon()); ?></td>
                                    <td><?php echo htmlspecialchars($pendaftar->getAsalSekolah()); ?></td>
                                    <td class="text-center">
                                        <span class="badge bg-info text-dark font-monospace fw-bold">
                                            <?php echo number_format($pendaftar->getNilaiUjian(), 2); ?>
                                        </span>
                                    </td>
                                    <td>Rp <?php echo number_format($pendaftar->getBiayaPendaftaranDasar(), 2, ',', '.'); ?></td>
                                    
                                    <td>
                                        <small class="text-muted d-block fw-medium">
                                            <?php echo htmlspecialchars($pendaftar->tampilkanInfoJalur()); ?>
                                        </small>
                                    </td>
                                    
                                    <td class="fw-bold text-success font-monospace">
                                        Rp <?php echo number_format($pendaftar->hitungTotalBiaya(), 2, ',', '.'); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<footer class="text-center py-4 text-muted small">
    &copy; 2026 - Tugas Simulasi PBO Terintegrasi (MySQL - PHP OOP). All Rights Reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>