<?php
// viewmodel untuk pelanggan, jadi penghubung antara view dan model pelanggan
class PelangganViewModel {
    // property untuk menyimpan instance model pelanggan
    private $model;

    // constructor menerima koneksi db lalu membuat objek model pelanggan
    public function __construct($db) {
        // include file model pelanggan
        include_once __DIR__ . '/../models/Pelanggan.php';
        // buat objek model pelanggan dan simpan
        $this->model = new Pelanggan($db);
    }

    // mengambil semua data pelanggan untuk ditampilkan di halaman list
    public function getAll() {
        return $this->model->getAll();
    }

    // mengambil satu data pelanggan berdasarkan id (dipakai untuk form edit)
    public function getById($id) {
        return $this->model->getById($id);
    }

    // membuat pelanggan baru, menerima data dari form create
    public function create($data) {
        // kirim nama dan telepon ke model untuk disimpan
        return $this->model->insert($data['nama'], $data['telepon']);
    }

    // mengupdate data pelanggan berdasarkan data form edit
    public function update($data) {
        // memanggil update di model dengan id, nama, dan telepon
        return $this->model->update($data['id_pelanggan'], $data['nama'], $data['telepon']);
    }

    // menghapus pelanggan berdasarkan id
    public function delete($id) {
        return $this->model->delete($id);
    }
}
