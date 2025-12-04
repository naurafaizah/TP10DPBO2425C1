<?php
class Pelanggan {
    // property untuk menyimpan koneksi database
    private $conn;

    // constructor menerima objek koneksi db dari luar
    public function __construct($db) {
        // simpan koneksi ke property agar bisa dipakai semua fungsi
        $this->conn = $db;
    }

    // mengambil seluruh data pelanggan
    public function getAll() {
        // siapkan query select semua data di tabel pelanggan
        $stmt = $this->conn->prepare("SELECT * FROM pelanggan");
        // eksekusi query
        $stmt->execute();
        // kembalikan semua hasil sebagai array asosiatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // menambah pelanggan baru
    public function insert($nama, $telepon) {
        // query insert dengan 2 placeholder: nama dan telepon
        $stmt = $this->conn->prepare("INSERT INTO pelanggan (nama, telepon) VALUES (?,?)");
        // eksekusi query dengan parameter nama dan telepon
        return $stmt->execute([$nama, $telepon]);
    }

    // mengupdate data pelanggan berdasarkan id
    public function update($id, $nama, $telepon) {
        // query update, ubah nama dan telepon berdasarkan id_pelanggan
        $stmt = $this->conn->prepare("UPDATE pelanggan SET nama=?, telepon=? WHERE id_pelanggan=?");
        // eksekusi query
        return $stmt->execute([$nama, $telepon, $id]);
    }

    // menghapus pelanggan berdasarkan id
    public function delete($id) {
        // query delete by id_pelanggan
        $stmt = $this->conn->prepare("DELETE FROM pelanggan WHERE id_pelanggan=?");
        // eksekusi query
        return $stmt->execute([$id]);
    }

    // mengambil satu pelanggan berdasarkan id
    public function getById($id) {
        // query select satu baris berdasarkan id_pelanggan
        $stmt = $this->conn->prepare("SELECT * FROM pelanggan WHERE id_pelanggan=?");
        // eksekusi dengan parameter id
        $stmt->execute([$id]);
        // ambil satu baris data
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
