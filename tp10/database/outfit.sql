CREATE DATABASE IF NOT EXISTS outfit;
USE outfit;

CREATE TABLE kategori (
    id_kategori INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100)
);

CREATE TABLE produk (
    id_produk INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100),
    harga INT,
    id_kategori INT,
    FOREIGN KEY (id_kategori) REFERENCES kategori(id_kategori)
);

CREATE TABLE pelanggan (
    id_pelanggan INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    telepon VARCHAR(20)
);

CREATE TABLE transaksi (
    id_transaksi INT AUTO_INCREMENT PRIMARY KEY,
    id_produk INT,
    id_pelanggan INT,
    jumlah INT,
    total_harga INT,
    FOREIGN KEY (id_produk) REFERENCES produk(id_produk),
    FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id_pelanggan)
);
