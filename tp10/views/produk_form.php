<?php

// menentukan mode form: create atau edit
$mode = isset($produk) ? 'edit' : 'create';
?>
<h2><?= $mode == 'edit' ? 'edit produk' : 'tambah produk' ?></h2>

<!-- form pengiriman data produk -->
<form method="post" action="index.php?view=produk_<?= $mode ?>">

    <?php if ($mode == 'edit'): ?>
        <!-- menyimpan id produk secara tersembunyi saat edit -->
        <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
    <?php endif; ?>

    <!-- input nama produk -->
    <label>nama produk</label><br>
    <input 
        type="text" 
        name="nama_produk" 
        value="<?= $mode=='edit' ? htmlspecialchars($produk['nama_produk']) : '' ?>" 
        required
    ><br>

    <!-- input harga produk -->
    <label>harga</label><br>
    <input 
        type="number" 
        name="harga" 
        value="<?= $mode=='edit' ? htmlspecialchars($produk['harga']) : '' ?>" 
        required
    ><br>

    <!-- dropdown kategori produk -->
    <label>kategori</label><br>
    <select name="id_kategori" required>
        <option value="">-- pilih --</option>

        <!-- looping semua kategori sebagai pilihan -->
        <?php foreach($kategoriList as $k): ?>
            <option 
                value="<?= $k['id_kategori'] ?>" 
                <?= ($mode=='edit' && $produk['id_kategori'] == $k['id_kategori']) ? 'selected' : '' ?>
            >
                <?= htmlspecialchars($k['nama']) ?>
            </option>
        <?php endforeach; ?>

    </select><br><br>

    <!-- tombol submit, berubah sesuai mode -->
    <button type="submit">
        <?= $mode=='edit' ? 'simpan' : 'tambah' ?>
    </button>

</form>

<!-- tombol kembali ke daftar produk -->
<a href="index.php?view=produk_index">kembali</a>
