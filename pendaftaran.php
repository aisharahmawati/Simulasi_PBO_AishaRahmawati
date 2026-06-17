<?php
// File: Pendaftaran.php

abstract class Pendaftaran {
    // Properti Terenkapsulasi (Protected)
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar;
    protected $jalur_pendaftaran;

    // Constructor untuk memetakan data dari database ke properti objek
    public function __construct($data) {
        $this->id_pendaftaran = $data['id_pendaftaran'] ?? null;
        $this->nama_calon = $data['nama_calon'] ?? '';
        $this->asal_sekolah = $data['asal_sekolah'] ?? '';
        $this->nilai_ujian = $data['nilai_ujian'] ?? 0.0;
        $this->biayaPendaftaranDasar = $data['biaya_pendaftaran_dasar'] ?? 0.0;
        $this->jalur_pendaftaran = $data['jalur_pendaftaran'] ?? '';
    }

    // Abstract Method - Wajib dibuat ulang secara spesifik di class anak
    abstract public function hitungTotalBiaya();
    abstract public function tampilkanKarakteristik();

    // Getter untuk mengakses properti yang dilindungi jika dibutuhkan di luar class
    public function getIdPendaftaran() { return $this->id_pendaftaran; }
    public function getNamaCalon() { return $this->nama_calon; }
    public function getAsalSekolah() { return $this->asal_sekolah; }
    public function getNilaiUjian() { return $this->nilai_ujian; }
    public function getBiayaPendaftaranDasar() { return $this->biayaPendaftaranDasar; }
    public function getJalurPendaftaran() { return $this->jalur_pendaftaran; }
}