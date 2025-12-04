<?php

class TransaksiViewModel {
    private $model;          // objek model transaksi
    private $produkModel;    // objek model produk, untuk ambil harga produk
    private $pelangganModel; // objek model pelanggan untuk dropdown form

    public function __construct($db) {
        // include semua model yang dibutuhkan
        include_once __DIR__ . '/../models/Transaksi.php';
        include_once __DIR__ . '/../models/Produk.php';
        include_once __DIR__ . '/../models/Pelanggan.php';

        // inisialisasi model
        $this->model = new Transaksi($db);
        $this->produkModel = new Produk($db);
        $this->pelangganModel = new Pelanggan($db);
    }

    public function getAll() {
        // ambil semua data transaksi
        return $this->model->getAll();
    }

    public function getProdukList() {
        // ambil list semua produk untuk dropdown
        return $this->produkModel->getAll();
    }

    public function getPelangganList() {
        // ambil list semua pelanggan untuk dropdown
        return $this->pelangganModel->getAll();
    }

    public function create($data) {
        // ambil data produk berdasarkan id untuk dapat harga
        $produk = $this->produkModel->getById($data['id_produk']);

        // kalau produk tidak ditemukan, hentikan proses
        if (!$produk) return false;

        // ambil harga dari produk
        $harga = (int)$produk['harga'];

        // ambil jumlah pembelian dari form
        $jumlah = (int)$data['jumlah'];

        // hitung total harga
        $total = $harga * $jumlah;

        // simpan transaksi ke database
        return $this->model->insert(
            $data['id_produk'],
            $data['id_pelanggan'],
            $jumlah,
            $total
        );
    }

    public function delete($id) {
        // hapus transaksi berdasarkan id
        return $this->model->delete($id);
    }
}
