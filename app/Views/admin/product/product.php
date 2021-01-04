<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content-admin'); ?>

<div class="row my-2">
    <div class="col-sm-6">
        <h1 class="mt-5">Daftar Produk</h1>
    </div>
    <div class="col-sm-4">
        <form action="" method="POST">
            <div class="input-group mt-5">
                <input type="text" class="form-control" placeholder="Cari produk.." name="keyword">
                <div class="input-group-append">
                    <button class="btn btn-dark" type="submit" name="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-2">
        <a href="admin/tambah-product" class="btn btn-success mt-5"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
            </svg> Tambah Produk</a>
    </div>
</div>
<div class="row">
    <div class="col">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                <?php foreach ($product as $p) : ?>
                    <tr>
                        <th class="align-middle"><?= $i++; ?></th>
                        <td class="align-middle"><img src="/img/<?= $p['image']; ?>" class="gambar" width="100"></td>
                        <td class="align-middle"><?= $p['nama_brand']; ?> <?= $p['type']; ?></td>
                        <td class="align-middle">Rp. <?= number_format($p['price'], 0, 0, '.'); ?>,-</td>
                        <td class="align-middle">
                            <span>
                                <a href="/admin/edit-product/<?= $p['slug']; ?>" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg> Ubah
                                </a>
                            </span>
                            <span>
                                <form action="/admin/<?= $p['id']; ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?');"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                                        </svg> Hapus
                                    </button>
                                </form>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $pager->links('product', 'product_pagination'); ?>
    </div>
</div>

<?= $this->endSection(); ?>