<?php

class ProdukViewModel {
    private $model;          // objek model produk
    private $kategoriModel;  // objek model kategori, dipakai untuk ambil daftar kategori

    public function __construct($db) {
        // include file model yang dibutuhkan
        include_once __DIR__ . '/../models/Produk.php';
        include_once __DIR__ . '/../models/Kategori.php';

        // inisialisasi model
        $this->model = new Produk($db);
        $this->kategoriModel = new Kategori($db);
    }

    public function getAll() {
        // ambil semua data produk
        return $this->model->getAll();
    }

    public function getById($id) {
        // ambil data produk berdasarkan id
        return $this->model->getById($id);
    }

    public function getKategoriList() {
        // ambil semua kategori untuk dropdown di form
        return $this->kategoriModel->getAll();
    }

    public function create($data) {
        // membuat produk baru dengan data dari form
        // pastikan key array sesuai name pada input form
        return $this->model->insert($data['nama_produk'], $data['harga'], $data['id_kategori']);
    }

    public function update($data) {
        // update data produk berdasarkan id
        // data harus berisi: id_produk, nama_produk, harga, id_kategori
        return $this->model->update(
            $data['id_produk'],
            $data['nama_produk'],
            $data['harga'],
            $data['id_kategori']
        );
    }

    public function delete($id) {
        // hapus produk berdasarkan id
        return $this->model->delete($id);
    }
}
