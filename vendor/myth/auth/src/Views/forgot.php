<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
<style>
    .btn {
        background-color: #333333;
        border: 1px solid #ffffff;
    }

    .btn:hover {
        background-color: #1b1a1a;
        border: 1px solid #333333;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-sm-6 login">
            <div class="login-plag">
                <img src="/img/icon-black.png" alt="">
                <p>Premium Reseller Handphone Terkemuka di Indonesia.</p>
                <p>Gabung dan rasakan kemudahan bertransaksi di Nameless Store</p>
            </div>
        </div>
        <div class="col-sm-6 mt-3">

            <div class="card">
                <h2 class="card-header"><?= lang('Auth.forgotPassword') ?></h2>
                <div class="card-body">

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <p><?= lang('Auth.enterEmailForInstructions') ?></p>

                    <form action="<?= route_to('forgot') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="form-group">
                            <label for="email"><?= lang('Auth.emailAddress') ?></label>
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.sendInstructions') ?></button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>