<?php

?>
<h2>tambah transaksi</h2>

<!-- form kirim data transaksi -->
<form method="post" action="index.php?view=transaksi_create">

    <!-- pilih produk yang mau dibeli -->
    <label>produk</label><br>
    <select name="id_produk" required>
        <option value="">-- pilih produk --</option>

        <!-- looping semua produk -->
        <?php foreach($produkList as $p): ?>
            <!-- tampilkan nama produk + harga untuk memudahkan user -->
            <option value="<?= $p['id_produk'] ?>">
                <?= htmlspecialchars($p['nama_produk']) ?> - <?= number_format($p['harga']) ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <!-- pilih pelanggan yang beli -->
    <label>pelanggan</label><br>
    <select name="id_pelanggan" required>
        <option value="">-- pilih pelanggan --</option>

        <!-- looping semua pelanggan -->
        <?php foreach($pelangganList as $pl): ?>
            <option value="<?= $pl['id_pelanggan'] ?>">
                <?= htmlspecialchars($pl['nama']) ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <!-- jumlah barang yang dibeli -->
    <label>jumlah</label><br>
    <input type="number" name="jumlah" min="1" value="1" required><br><br>

    <!-- tombol submit -->
    <button type="submit">simpan transaksi</button>
</form>

<!-- tombol kembali ke halaman transaksi -->
<a href="index.php?view=transaksi_index">kembali</a>
