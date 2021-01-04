<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content-admin'); ?>

<div class="container">
    <div class="row mt-4 justify-content-center">
        <table class="table table-hover table-bordered">
            <tr class="table-active text-center">
                <th>No.</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kota Tujuan</th>
                <th>Kurir</th>
                <th>Pembayaran</th>
                <th>Produk</th>
            </tr>
            <?php $i = 1 ?>
            <?php foreach ($transaction as $t) : ?>
                <tr>
                    <th><?= $i++; ?></th>
                    <td><?= $t['nama_lengkap']; ?></td>
                    <td><?= $t['alamat']; ?></td>
                    <td><?= $t['kota_tujuan']; ?></td>
                    <td><?= $t['kurir']; ?></td>
                    <td><?= $t['pembayaran']; ?></td>
                    <td><?= $t['type']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>