<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content-admin'); ?>

<div class="container">
    <div class="row mt-4 justify-content-center">
        <div class="col-md-8">
            <table class="table table-hover table-bordered">
                <tr class="table-active">
                    <th>No.</th>
                    <th>Nama Brand</th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach ($brand as $b) : ?>
                    <tr>
                        <th><?= $b['id_brand']; ?></th>
                        <td><?= $b['nama_brand']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>