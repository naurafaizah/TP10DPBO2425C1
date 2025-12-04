<?php
class Kategori {
    // property untuk menyimpan koneksi database
    private $conn;

    // constructor menerima objek koneksi db dari luar
    public function __construct($db) {
        // menyimpan koneksi ke property agar bisa dipakai di semua fungsi
        $this->conn = $db;
    }

    // mengambil semua data kategori dari tabel
    public function getAll() {
        // prepare query select semua baris dari tabel kategori
        $stmt = $this->conn->prepare("SELECT * FROM kategori");
        // eksekusi query
        $stmt->execute();
        // ambil semua hasil dalam bentuk array asosiatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // menambah data kategori baru
    public function insert($nama) {
        // siapkan query insert dengan placeholder
        $stmt = $this->conn->prepare("INSERT INTO kategori (nama) VALUES (?)");
        // jalankan query sambil mengirim nilai nama
        return $stmt->execute([$nama]);
    }

    // mengubah data kategori berdasarkan id
    public function update($id, $nama) {
        // query update berdasarkan id_kategori
        $stmt = $this->conn->prepare("UPDATE kategori SET nama=? WHERE id_kategori=?");
        // eksekusi dengan parameter nama dan id
        return $stmt->execute([$nama, $id]);
    }

    // menghapus kategori berdasarkan id
    public function delete($id) {
        // query delete dengan kondisi id_kategori
        $stmt = $this->conn->prepare("DELETE FROM kategori WHERE id_kategori=?");
        // eksekusi query
        return $stmt->execute([$id]);
    }

    // mengambil satu data kategori berdasarkan id
    public function getById($id) {
        // query select 1 baris berdasarkan id
        $stmt = $this->conn->prepare("SELECT * FROM kategori WHERE id_kategori=?");
        // eksekusi dengan parameter id
        $stmt->execute([$id]);
        // ambil 1 baris data saja
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
