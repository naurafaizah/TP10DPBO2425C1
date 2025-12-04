<?php

?>

<!-- judul halaman -->
<h2>transaksi</h2>

<!-- tombol untuk menuju form tambah transaksi -->
<a href="index.php?view=transaksi_create">tambah transaksi</a>

<!-- tabel untuk menampilkan seluruh data transaksi -->
<table border="1" cellpadding="6">
    <tr>
        <!-- header tabel untuk setiap kolom -->
        <th>id</th>
        <th>produk</th>
        <th>pelanggan</th>
        <th>jumlah</th>
        <th>total</th>
        <th>aksi</th>
    </tr>

    <!-- melakukan looping untuk setiap item transaksi -->
    <?php foreach($transaksiList as $t): ?>
    <tr>
        <!-- menampilkan id transaksi -->
        <td><?= $t['id_transaksi'] ?></td>

        <!-- menampilkan nama produk, dihtmlspecialchars agar aman dari script injection -->
        <td><?= htmlspecialchars($t['nama_produk']) ?></td>

        <!-- menampilkan nama pelanggan -->
        <td><?= htmlspecialchars($t['nama_pelanggan']) ?></td>

        <!-- menampilkan jumlah produk yang dibeli -->
        <td><?= $t['jumlah'] ?></td>

        <!-- menampilkan total harga dengan format angka -->
        <td><?= number_format($t['total_harga']) ?></td>

        <td>
            <!-- tombol hapus dengan konfirmasi sebelum menghapus data -->
            <a href="index.php?delete_transaksi=<?= $t['id_transaksi'] ?>"
               onclick="return confirm('hapus transaksi ini?')">
               hapus
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
