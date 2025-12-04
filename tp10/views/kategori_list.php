<?php

// halaman untuk menampilkan daftar kategori

?>
<h2>kategori</h2>

<!-- tombol untuk menuju halaman tambah kategori -->
<a href="index.php?view=kategori_create">tambah kategori</a>

<!-- tabel daftar kategori -->
<table border="1" cellpadding="6">
    <tr>
        <th>id</th>
        <th>nama</th>
        <th>aksi</th>
    </tr>

    <!-- looping setiap data kategori -->
    <?php foreach($kategoriList as $k): ?>
    <tr>
        <!-- tampilkan id kategori -->
        <td><?= $k['id_kategori'] ?></td>

        <!-- tampilkan nama kategori dengan htmlspecialchars untuk keamanan -->
        <td><?= htmlspecialchars($k['nama']) ?></td>

        <td>
            <!-- tombol edit -->
            <a href="index.php?view=kategori_edit&id=<?= $k['id_kategori'] ?>">edit</a> |

            <!-- tombol hapus dengan konfirmasi -->
            <a 
                href="index.php?delete_kategori=<?= $k['id_kategori'] ?>" 
                onclick="return confirm('hapus kategori ini?')"
            >
                hapus
            </a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
