<?php

?>
<h2>produk</h2>

<!-- tombol menuju form tambah produk -->
<a href="index.php?view=produk_create">tambah produk</a>

<!-- tabel daftar produk -->
<table border="1" cellpadding="6">
    <tr>
        <th>id</th>
        <th>nama</th>
        <th>harga</th>
        <th>kategori</th>
        <th>aksi</th>
    </tr>

    <!-- looping semua produk -->
    <?php foreach($produkList as $p): ?>
    <tr>
        <!-- menampilkan id produk -->
        <td><?= $p['id_produk'] ?></td>

        <!-- nama produk, pake htmlspecialchars biar aman dari script -->
        <td><?= htmlspecialchars($p['nama_produk']) ?></td>

        <!-- harga diformat pakai number_format biar lebih rapi -->
        <td><?= number_format($p['harga']) ?></td>

        <!-- nama kategori dari join tabel kategori -->
        <td><?= htmlspecialchars($p['kategori']) ?></td>

        <!-- tombol edit dan hapus -->
        <td>
            <!-- tombol edit produk -->
            <a href="index.php?view=produk_edit&id=<?= $p['id_produk'] ?>">edit</a> |

            <!-- tombol hapus produk dengan konfirmasi -->
            <a href="index.php?delete_produk=<?= $p['id_produk'] ?>" onclick="return confirm('hapus produk ini?')">hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
