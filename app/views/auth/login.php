<?php
if (isset($_SESSION['nim'])) {
    header('Location: ' . BASEURL . '/middleware/notify');
    exit;
}
?>

<div class="container">

    <div class="row">
        <div class="col col-md-6 mx-auto">
            <?php Flasher::alert(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-11 col-md-8 col-lg-6 mx-auto mt-5 px-3 px-md-5 bg-white shadow-sm border rounded">

            <?php if (isset($data['login']) && $data['login'] == 'admin') : ?>
                <h3 class="pt-4 text-uppercase border-bottom text-center">Login Admin</h3>
                <form action="<?= BASEURL; ?>/auth/loginAdmin" method="POST" class="pb-5 pt-3">

                <?php else : ?>
                    <h3 class="pt-4 text-uppercase border-bottom text-center">Login Mahasiswa</h3>
                    <form action="<?= BASEURL; ?>/auth/loginMahasiswa" method="POST" class="pb-5 pt-3">

                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="nim" class="form-label">
                            Nim
                        </label>
                        <input type="text" class="form-control" id="nim" name="nim" required>
                    </div>
                    <div class="mb-5">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
        </div>
    </div>
</div>