<?php
// File: PendaftaranKedinasan.php
require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    private $skIkatanDinas;
    private $instansiSponsor;

    public function __construct($data) {
        parent::__construct($data);
        $this->skIkatanDinas = $data['sk_ikatan_dinas'] ?? null;
        $this->instansiSponsor = $data['instansi_sponsor'] ?? null;
    }

    public static function getDaftarKedinasan($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 3. OVERRIDING: Dikenakan surcharge tambahan administrasi dinas sebesar 25%
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar * 1.25;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Kedinasan | Instansi: " . $this->instansiSponsor . " | No SK: " . $this->skIkatanDinas;
    }

    public function getSkIkatanDinas() { return $this->skIkatanDinas; }
    public function getInstansiSponsor() { return $this->instansiSponsor; }
}