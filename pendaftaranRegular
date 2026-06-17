<?php
// File: PendaftaranReguler.php
require_once 'Pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    private $pilihanProdi;
    private $lokasiKampus;

    public function __construct($data) {
        parent::__construct($data);
        $this->pilihanProdi = $data['pilihan_prodi'] ?? null;
        $this->lokasiKampus = $data['lokasi_kampus'] ?? null;
    }

    public static function getDaftarReguler($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Reguler'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 1. OVERRIDING: Tarif standar murni tanpa biaya tambahan
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Reguler | Program Studi: " . $this->pilihanProdi . " | Kampus: " . $this->lokasiKampus;
    }

    public function getPilihanProdi() { return $this->pilihanProdi; }
    public function getLokasiKampus() { return $this->lokasiKampus; }
}