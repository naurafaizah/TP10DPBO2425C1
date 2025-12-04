<?php
// viewmodel untuk kategori, menghubungkan logic model dengan view
class KategoriViewModel {
    // property untuk menyimpan instance model kategori
    private $model;

    // constructor menerima koneksi db dan membuat objek model kategori
    public function __construct($db) {
        // include file model kategori (pastikan hanya sekali)
        include_once __DIR__ . '/../models/Kategori.php';
        // buat objek model kategori dan simpan di property
        $this->model = new Kategori($db);
    }

    // mengambil semua data kategori untuk ditampilkan di view
    public function getAll() {
        return $this->model->getAll();
    }

    // mengambil satu data kategori berdasarkan id (untuk edit)
    public function getById($id) {
        return $this->model->getById($id);
    }

    // membuat kategori baru, menerima data dari form
    public function create($data) {
        // hanya butuh field nama
        return $this->model->insert($data['nama']);
    }

    // mengupdate data kategori berdasarkan data form edit
    public function update($data) {
        // memanggil method update di model dengan id dan nama
        return $this->model->update($data['id_kategori'], $data['nama']);
    }

    // menghapus kategori berdasarkan id
    public function delete($id) {
        return $this->model->delete($id);
    }
}
