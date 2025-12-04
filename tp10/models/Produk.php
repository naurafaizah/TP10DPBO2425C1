<?php
class Produk {
    // property untuk menyimpan koneksi database
    private $conn;

    // constructor menerima objek koneksi db
    public function __construct($db) {
        // simpan koneksi agar bisa dipakai seluruh fungsi
        $this->conn = $db;
    }

    // mengambil semua produk beserta nama kategori (join)
    public function getAll() {
        // query ambil semua produk dan join dengan tabel kategori
        $stmt = $this->conn->prepare("
            SELECT p.*, k.nama AS kategori
            FROM produk p
            JOIN kategori k ON p.id_kategori = k.id_kategori
        ");
        // eksekusi query
        $stmt->execute();
        // kembalikan semua data sebagai array asosiatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // menambah produk baru
    public function insert($nama, $harga, $id_kategori) {
        // query insert dengan placeholder
        $stmt = $this->conn->prepare("
            INSERT INTO produk (nama_produk, harga, id_kategori)
            VALUES (?,?,?)
        ");
        // eksekusi query dengan parameter nama, harga, dan id kategori
        return $stmt->execute([$nama, $harga, $id_kategori]);
    }

    // mengupdate produk berdasarkan id
    public function update($id, $nama, $harga, $id_kategori) {
        // query update nama, harga, dan kategori berdasarkan id_produk
        $stmt = $this->conn->prepare("
            UPDATE produk
            SET nama_produk=?, harga=?, id_kategori=?
            WHERE id_produk=?
        ");
        // eksekusi query
        return $stmt->execute([$nama, $harga, $id_kategori, $id]);
    }

    // menghapus produk berdasarkan id
    public function delete($id) {
        // query delete berdasarkan id_produk
        $stmt = $this->conn->prepare("DELETE FROM produk WHERE id_produk=?");
        // eksekusi query
        return $stmt->execute([$id]);
    }

    // mengambil satu produk berdasarkan id
    public function getById($id) {
        // query select satu baris data produk
        $stmt = $this->conn->prepare("SELECT * FROM produk WHERE id_produk=?");
        // eksekusi query
        $stmt->execute([$id]);
        // kembalikan satu baris hasil
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
