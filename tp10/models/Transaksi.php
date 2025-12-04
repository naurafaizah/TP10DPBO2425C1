<?php
class Transaksi {
    // property untuk menyimpan koneksi database
    private $conn;

    // constructor menyimpan koneksi db ke property class
    public function __construct($db) {
        $this->conn = $db;
    }

    // mengambil seluruh data transaksi lengkap dengan nama produk dan nama pelanggan
    public function getAll() {
        // query join tabel transaksi dengan produk dan pelanggan
        $stmt = $this->conn->prepare("
            SELECT t.*, p.nama_produk, pl.nama AS nama_pelanggan
            FROM transaksi t
            JOIN produk p ON t.id_produk = p.id_produk
            JOIN pelanggan pl ON t.id_pelanggan = pl.id_pelanggan
        ");
        // eksekusi query
        $stmt->execute();
        // kembalikan seluruh data sebagai array asosiatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // menambah transaksi baru
    public function insert($id_produk, $id_pelanggan, $jumlah, $total_harga) {
        // query insert transaksi baru
        $stmt = $this->conn->prepare("
            INSERT INTO transaksi (id_produk, id_pelanggan, jumlah, total_harga)
            VALUES (?,?,?,?)
        ");
        // masukkan parameter ke query
        return $stmt->execute([$id_produk, $id_pelanggan, $jumlah, $total_harga]);
    }

    // menghapus transaksi berdasarkan id
    public function delete($id) {
        // query delete berdasarkan id_transaksi
        $stmt = $this->conn->prepare("DELETE FROM transaksi WHERE id_transaksi=?");
        // eksekusi penghapusan
        return $stmt->execute([$id]);
    }
}
