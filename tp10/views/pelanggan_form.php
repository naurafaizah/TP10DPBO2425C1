<?php

// menentukan mode form, create atau edit
$mode = isset($pelanggan) ? 'edit' : 'create';
?>

<!-- judul form sesuai mode -->
<h2><?= $mode=='edit' ? 'edit pelanggan' : 'tambah pelanggan' ?></h2>

<!-- form submit ke handler sesuai mode -->
<form method="post" action="index.php?view=pelanggan_<?= $mode ?>">

    <?php if ($mode=='edit'): ?>
        <!-- input hidden untuk menyimpan id pelanggan saat edit -->
        <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>">
    <?php endif; ?>

    <!-- input nama pelanggan -->
    <label>nama</label><br>
    <input 
        type="text" 
        name="nama" 
        value="<?= $mode=='edit' ? htmlspecialchars($pelanggan['nama']) : '' ?>" 
        required
    ><br>

    <!-- input nomor telepon -->
    <label>telepon</label><br>
    <input 
        type="text" 
        name="telepon" 
        value="<?= $mode=='edit' ? htmlspecialchars($pelanggan['telepon']) : '' ?>" 
        required
    ><br><br>

    <!-- tombol submit -->
    <button type="submit"><?= $mode=='edit' ? 'simpan' : 'tambah' ?></button>
</form>

<!-- tombol kembali ke daftar pelanggan -->
<a href="index.php?view=pelanggan_index">kembali</a>
