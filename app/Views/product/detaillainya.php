<!-- Start Card -->
<div class="container">
    <h1 class="text-center mt-5 mb-4">Produk Lainnya</h1>
    <div class="row mt-2">
        <?php foreach ($product as $p) : ?>
            <div class="col-sm-4 mt-3" style="display: flex; align-items: center; justify-content: center;">
                <a href="/product/<?= $p['slug']; ?>" class="info-pro">
                    <div class="card card-product" style="width: 16rem;">
                        <img src="/img/<?= $p['image']; ?>" class="card-img-top">
                        <div class="card-body">
                            <h6 class="card-title"><?= $p['nama_brand']; ?> <?= $p['type']; ?></h6>
                            <p class="card-text">Rp. <?= number_format($p['price'], 0, 0, '.'); ?>,-</p>
                            <a href="/cart/beli/<?= $p['id']; ?>" class="btn btn-dark">
                                <h6>+ Keranjang</h6>
                            </a>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- End Card -->