<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <div class="pt-5 pb-3">
        <h2><b>Checkout</b></h2>
    </div>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Keranjang</span>
                <span class="badge badge-secondary badge-pill"><?= count($items); ?></span>
            </h4>
            <ul class="list-group mb-3">
                <?php foreach ($items as $key => $item) : ?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <img src="/img/<?= $item['image']; ?>" width="100">
                        </div>
                        <span>
                            <h6 class="my-0"><?= $item['type']; ?></h6>
                            <span class="text-muted">Rp. <?= number_format($item['quantity'] * $item['price'], 0, 0, '.'); ?>,-</span>
                        </span>
                        <p>(<?= $item['quantity']; ?>)</p>
                    </li>
                <?php endforeach; ?>
                <li class="list-group-item d-flex justify-content-between">
                    <span>
                        <p>Ongkir</p>
                        <h5>Total</h5>
                    </span>
                    <span>
                        <p class="text-right" id="harga_ongkir">Rp. 10.000,-</p>
                        <strong>Rp. <?= number_format($total + 10000, 0, 0, '.'); ?>,-</strong>
                    </span>
                </li>
            </ul>
        </div>

        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Alamat Pengiriman</h4>
            <form action="/transaction/saveTransaction/<?= $item['id']; ?>" method="POST" enctype="multipart/form-data" id="ongkir">
                <div class="mb-3">
                    <label for="fullName">Nama Lengkap</label>
                    <input type="name" class="form-control" id="fullName" name="nama_lengkap" placeholder="Andi Nugraha" value="" required>
                    <div class="invalid-feedback">
                        Masukkan nama lengkap.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Alamat</label>
                    <textarea type="address" rows="5" class="form-control" id="address" name="alamat" placeholder="Jl. Melati No.123" required></textarea>
                    <div class="invalid-feedback">
                        Masukkan alamat pengiriman.
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tujuan">Kota Tujuan</label>
                        <select class="custom-select d-block w-100" id="kota_tujuan" name="kota_tujuan" required>
                            <option>Pilih Kota</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="kurir">Kurir</label>
                        <select class="custom-select d-block w-100" id="kurir" name="kurir" required>
                            <option value="">Pilih Kurir</option>
                            <option value="JNE">JNE</option>
                            <option value="TIKI">TIKI</option>
                            <option value="POS INDONESIA">POS Indonesia</option>
                        </select>
                    </div>
                </div>

                <hr class="my-4">

                <h4 class="mb-3">Pembayaran</h4>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="bank" name="pembayaran" type="radio" value="Transfer Bank" class="custom-control-input" checked required>
                        <label class="custom-control-label" for="bank">Transfer Bank</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="kredit" name="pembayaran" type="radio" value="Kartu Kredit" class="custom-control-input" required>
                        <label class="custom-control-label" for="kredit">Kartu Kredit</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="indomaret" name="pembayaran" type="radio" value="Indomaret" class="custom-control-input" required>
                        <label class="custom-control-label" for="indomaret">Indomaret</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="alfamart" name="pembayaran" type="radio" value="Alfamart" class="custom-control-input" required>
                        <label class="custom-control-label" for="alfamart">Alfamart</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="ovo" name="pembayaran" type="radio" value="OVO" class="custom-control-input" required>
                        <label class="custom-control-label" for="ovo">OVO</label>
                    </div>
                </div>

                <hr class="mb-4">
                <button class="btn btn-dark btn-lg btn-block mb-5" type="submit">Beli</button>
            </form>
        </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $('document').ready(function() {
        $.ajax({
            type: "GET",
            dataType: "html",
            url: "<?= site_url('transaction/getcity') ?>",
            success: function(data) {
                $("select#kota_tujuan").html(data);
            }
        });
    });
</script>
<?= $this->endsection(); ?>