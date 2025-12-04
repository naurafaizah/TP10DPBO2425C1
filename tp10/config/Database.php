<?php
class Database {
    // property untuk menyimpan konfigurasi koneksi database
    private $host = "localhost";
    private $dbname = "outfit";
    private $username = "root";
    private $password = "";

    // property untuk menyimpan objek koneksi pdo
    public $conn;

    public function getConnection() {
        // awalnya koneksi di-set null dulu
        $this->conn = null;

        try {
            // membuat koneksi baru ke mysql menggunakan pdo
            // menggabungkan host dan nama database ke dalam dsn
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->dbname,
                $this->username,
                $this->password
            );

        } catch (PDOException $e) {
            // jika gagal konek, tampilkan pesan error
            echo "connection error: " . $e->getMessage();
        }

        // mengembalikan objek koneksi agar bisa dipakai di file lain
        return $this->conn;
    }
}
