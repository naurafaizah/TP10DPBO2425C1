<?php

?>
<h2>pelanggan</h2>

<!-- tombol untuk menuju halaman tambah pelanggan -->
<a href="index.php?view=pelanggan_create">tambah pelanggan</a>

<!-- tabel untuk menampilkan semua data pelanggan -->
<table border="1" cellpadding="6">
    <tr>
        <!-- header kolom tabel -->
        <th>id</th>
        <th>nama</th>
        <th>telepon</th>
        <th>aksi</th>
    </tr>

    <!-- looping setiap data pelanggan -->
    <?php foreach($pelangganList as $pl): ?>
    <tr>
        <!-- menampilkan id pelanggan -->
        <td><?= $pl['id_pelanggan'] ?></td>

        <!-- menampilkan nama pelanggan, diamankan pakai htmlspecialchars -->
        <td><?= htmlspecialchars($pl['nama']) ?></td>

        <!-- menampilkan nomor telepon pelanggan -->
        <td><?= htmlspecialchars($pl['telepon']) ?></td>

        <!-- tombol aksi: edit dan hapus -->
        <td>
            <!-- tombol edit, menuju form edit berdasarkan id -->
            <a href="index.php?view=pelanggan_edit&id=<?= $pl['id_pelanggan'] ?>">edit</a> |

            <!-- tombol hapus, menggunakan konfirmasi javascript -->
            <a 
                href="index.php?delete_pelanggan=<?= $pl['id_pelanggan'] ?>" 
                onclick="return confirm('hapus pelanggan ini?')"
            >
                hapus
            </a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
