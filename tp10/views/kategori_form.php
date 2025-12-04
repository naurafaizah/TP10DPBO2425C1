<?php

// tentukan mode halaman: edit atau create
$mode = isset($kategori) ? 'edit' : 'create';
?>

<h2><?= $mode == 'edit' ? 'edit kategori' : 'tambah kategori' ?></h2>

<!-- form untuk tambah atau edit kategori -->
<form method="post" action="index.php?view=kategori_<?= $mode ?>">

    <?php if ($mode == 'edit'): ?>
        <!-- hidden input untuk membawa id kategori saat edit -->
        <input type="hidden" name="id_kategori" value="<?= $kategori['id_kategori'] ?>">
    <?php endif; ?>

    <label>nama</label><br>

    <!-- input nama kategori; saat edit akan terisi otomatis -->
    <input 
        type="text" 
        name="nama" 
        value="<?= $mode == 'edit' ? htmlspecialchars($kategori['nama']) : '' ?>" 
        required
    ><br><br>

    <!-- tombol sesuai mode -->
    <button type="submit">
        <?= $mode == 'edit' ? 'simpan' : 'tambah' ?>
    </button>

</form>

<!-- tombol kembali ke halaman daftar kategori -->
<a href="index.php?view=kategori_index">kembali</a>
