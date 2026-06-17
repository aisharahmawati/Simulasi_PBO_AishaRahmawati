<?php
// File: PendaftaranKedinasan.php
require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan spesifik jalur Kedinasan
    private $skIkatanDinas;
    private $instansiSponsor;

    // Constructor
    public function __construct($data) {
        parent::__construct($data);
        $this->skIkatanDinas = $data['sk_ikatan_dinas'] ?? null;
        $this->instansiSponsor = $data['instansi_sponsor'] ?? null;
    }

    // Metode Query Spesifik untuk mengambil semua data jalur Kedinasan
    public static function getDaftarKedinasan($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Kewajiban implementasi abstract method dari Tahap 3 (Logika kosong / dasar dulu)
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Kedinasan | Instansi: " . $this->instansiSponsor . " | No SK: " . $this->skIkatanDinas;
    }

    // Getter untuk properti spesifik
    public function getSkIkatanDinas() { return $this->skIkatanDinas; }
    public function getInstansiSponsor() { return $this->instansiSponsor; }
}