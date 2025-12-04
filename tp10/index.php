<?php

include "config/Database.php";

// buat koneksi db
$dbClass = new Database();
$db = $dbClass->getConnection();

// include semua viewmodel yg dibutuhkan
include_once "viewmodels/KategoriViewModel.php";
include_once "viewmodels/ProdukViewModel.php";
include_once "viewmodels/PelangganViewModel.php";
include_once "viewmodels/TransaksiViewModel.php";

// inisialisasi semua viewmodel dengan koneksi db
$kategoriVM = new KategoriViewModel($db);
$produkVM = new ProdukViewModel($db);
$pelangganVM = new PelangganViewModel($db);
$transaksiVM = new TransaksiViewModel($db);

// ambil parameter view utk menentukan halaman yg ditampilkan
$view = $_GET['view'] ?? 'home';

// handle aksi hapus berbasis query param
// setiap hapus akan redirect kembali ke halaman daftar
if (isset($_GET['delete_kategori'])) {
    $kategoriVM->delete($_GET['delete_kategori']);
    header("Location: index.php?view=kategori_index"); 
    exit;
}
if (isset($_GET['delete_produk'])) {
    $produkVM->delete($_GET['delete_produk']);
    header("Location: index.php?view=produk_index"); 
    exit;
}
if (isset($_GET['delete_pelanggan'])) {
    $pelangganVM->delete($_GET['delete_pelanggan']);
    header("Location: index.php?view=pelanggan_index"); 
    exit;
}
if (isset($_GET['delete_transaksi'])) {
    $transaksiVM->delete($_GET['delete_transaksi']);
    header("Location: index.php?view=transaksi_index"); 
    exit;
}

// header navigasi sederhana utk berpindah antar halaman
echo '<nav>
    <a href="index.php?view=kategori_index">kategori</a> | 
    <a href="index.php?view=produk_index">produk</a> | 
    <a href="index.php?view=pelanggan_index">pelanggan</a> | 
    <a href="index.php?view=transaksi_index">transaksi</a>
    <hr>
</nav>';

// routing utama menggunakan switch case
switch($view) {

    // kategori 
    case 'kategori_index':
        // ambil semua kategori dan tampilkan list
        $kategoriList = $kategoriVM->getAll();
        include "views/kategori_list.php";
        break;

    case 'kategori_create':
        // jika form disubmit maka insert
        if ($_POST) {
            $kategoriVM->create($_POST);
            header("Location: index.php?view=kategori_index");
            exit;
        }
        // tampilkan form input
        include "views/kategori_form.php";
        break;

    case 'kategori_edit':
        // jika form disubmit maka update
        if ($_POST) {
            $kategoriVM->update($_POST);
            header("Location: index.php?view=kategori_index");
            exit;
        }

        // ambil id kategori untuk diedit
        $id = $_GET['id'] ?? null;
        if (!$id) { 
            header("Location: index.php?view=kategori_index"); 
            exit; 
        }

        // ambil data lama utk ditampilkan di form
        $kategori = $kategoriVM->getById($id);
        include "views/kategori_form.php";
        break;


    // produk
    case 'produk_index':
        // tampilkan semua produk
        $produkList = $produkVM->getAll();
        include "views/produk_list.php";
        break;

    case 'produk_create':
        // proses tambah produk
        if ($_POST) {
            $produkVM->create($_POST);
            header("Location: index.php?view=produk_index"); 
            exit;
        }

        // ambil daftar kategori utk dropdown
        $kategoriList = $produkVM->getKategoriList();
        include "views/produk_form.php";
        break;

    case 'produk_edit':
        // proses update data produk
        if ($_POST) {
            $produkVM->update($_POST);
            header("Location: index.php?view=produk_index"); 
            exit;
        }

        // ambil id produk utk diedit
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?view=produk_index");
            exit;
        }

        // ambil data lama produk dan daftar kategori
        $produk = $produkVM->getById($id);
        $kategoriList = $produkVM->getKategoriList();
        include "views/produk_form.php";
        break;


    // pelanggan
    case 'pelanggan_index':
        // tampilkan semua pelanggan
        $pelangganList = $pelangganVM->getAll();
        include "views/pelanggan_list.php";
        break;

    case 'pelanggan_create':
        // proses tambah pelanggan
        if ($_POST) {
            $pelangganVM->create($_POST);
            header("Location: index.php?view=pelanggan_index"); 
            exit;
        }
        // tampilkan form input pelanggan
        include "views/pelanggan_form.php";
        break;

    case 'pelanggan_edit':
        // proses update pelanggan
        if ($_POST) {
            $pelangganVM->update($_POST);
            header("Location: index.php?view=pelanggan_index"); 
            exit;
        }

        // ambil id pelanggan utk diedit
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?view=pelanggan_index");
            exit;
        }

        $pelanggan = $pelangganVM->getById($id);
        include "views/pelanggan_form.php";
        break;


    // transaksi
    case 'transaksi_index':
        // tampilkan semua transaksi
        $transaksiList = $transaksiVM->getAll();
        include "views/transaksi_list.php";
        break;

    case 'transaksi_create':
        // proses tambah transaksi
        if ($_POST) {
            $transaksiVM->create($_POST);
            header("Location: index.php?view=transaksi_index"); 
            exit;
        }

        // ambil dropdown produk dan pelanggan
        $produkList = $transaksiVM->getProdukList();
        $pelangganList = $transaksiVM->getPelangganList();
        include "views/transaksi_form.php";
        break;


    // default
    default:
        // halaman default ketika tidak ada view
        echo "<h2>selamat datang di aplikasi toko outfit (mvvm sederhana)</h2>";
        echo "<p>gunakan menu di atas untuk mengelola data.</p>";
        break;
}
