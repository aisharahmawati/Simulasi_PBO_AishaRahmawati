<?php
// File: koneksi/database.php

class Koneksi {
    private $host = "localhost";
    private $username = "root";
    private $password = ""; // Silakan sesuaikan dengan password MySQL di laptop Anda
    private $db_name = "DB_SIMULASI_PBO_TI1C_AishaRahmawati";
    protected $db;

    // Method untuk membuka koneksi PDO
    public function hubungkan() {
        $this->db = null;
        try {
            // Menggunakan PDO untuk koneksi database yang aman dan OOP murni
            $this->db = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            // Mengaktifkan mode exception untuk penanganan error
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Koneksi ke database gagal: " . $e->getMessage();
        }
        return $this->db;
    }
}