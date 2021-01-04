<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content-admin'); ?>

<div class="container">
    <div class="row mt-4 justify-content-center">
        <table class="table table-hover table-bordered">
            <tr class="table-active">
                <th>No.</th>
                <th>Email</th>
                <th>Username</th>
                <th>Role</th>
            </tr>
            <?php $i = 1 ?>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <th><?= $i++; ?></th>
                    <td><?= $user->email; ?></td>
                    <td><?= $user->username; ?></td>
                    <td><?= $user->name; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>