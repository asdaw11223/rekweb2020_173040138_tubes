<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row mt-5">
        <div class="col">
            <div class="card mt-5">
                <div class="card-header cart">
                    <h6>Keranjang (<?= count($items); ?>)</h6>
                </div>
                <div class="card-body">
                    <!-- tampilkan pesan success -->
                    <?php if (session()->getFlashdata('success') != null) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <!-- selesai menampilkan pesan success -->
                    <?php if (count($items) != 0) { // cek apakan keranjang belanja lebih dari 0, jika iya maka tampilkan list dalam bentuk table di bawah ini: 
                    ?>
                        <div class="table-responsive">
                            <?= form_open('cart/update'); ?>
                            <table class="table table-bordered text-center">
                                <tbody>
                                    <?php foreach ($items as $key => $item) : ?>
                                        <tr>
                                            <td class="align-middle"><img src="<?= base_url('img/' . $item['image']); ?>" width="100px"></td>
                                            <td class="align-middle"><?= $item['type']; ?></td>
                                            <td class="align-middle">
                                                <input type="number" name="quantity[]" min="1" class="form-control" value="<?= $item['quantity']; ?>" style="width:50px">
                                            </td>
                                            <td class="align-middle">Rp. <?= number_format($item['quantity'] * $item['price'], 0, 0, '.'); ?></td>
                                            <td class="align-middle">
                                                <div class="btn-group">
                                                    <a href="<?= base_url('cart/remove/' . $item['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini dari keranjang?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                        </svg></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="3" class="text-right">
                                            <h6>Total</h6>
                                        </td>
                                        <td>
                                            <h6>Rp. <?= number_format($total, 0, 0, '.'); ?></h6>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                            <?= form_close(); ?>

                        </div>
                    <?php } // selesai menampilkan list cart dalam bentuk table 
                    ?>

                    <?php if (count($items) == 0) { // jika cart kosong, maka tampilkan: 
                    ?>
                        <div class="text-kosong">
                            <h3>Keranjang belanja Anda kosong.</h3>
                            <a href="<?= base_url('product'); ?>" class="btn btn-dark">Belanja Dulu Yuk!</a>
                        </div>
                    <?php } else { // jika cart tidak kosong, tampilkan: 
                    ?>
                        <div class="text-ada">
                            <a href="<?= base_url('transaction'); ?>" class="btn btn-dark">Checkout</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>