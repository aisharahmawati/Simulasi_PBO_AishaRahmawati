<?php
// File: PendaftaranPrestasi.php
require_once 'Pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    private $pilihanProdi;
    private $lokasiKampus;
    private $jenisPrestasi;
    private $tingkatPrestasi;

    public function __construct($data) {
        parent::__construct($data);
        $this->pilihanProdi = $data['pilihan_prodi'] ?? null; 
        $this->lokasiKampus = $data['lokasi_kampus'] ?? null;
        $this->jenisPrestasi = $data['jenis_prestasi'] ?? null;
        $this->tingkatPrestasi = $data['tingkat_prestasi'] ?? null;
    }

    public static function getDaftarPrestasi($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Prestasi'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 2. OVERRIDING: Mendapatkan potongan insentif sebesar Rp50.000
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar - 50000;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Prestasi | Jenis: " . $this->jenisPrestasi . " | Tingkat: " . $this->tingkatPrestasi;
    }

    public function getPilihanProdi() { return $this->pilihanProdi; }
    public function getLokasiKampus() { return $this->lokasiKampus; }
    public function getJenisPrestasi() { return $this->jenisPrestasi; }
    public function getTingkatPrestasi() { return $this->tingkatPrestasi; }
}