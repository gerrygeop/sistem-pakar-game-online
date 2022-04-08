<?php 
    if (isset($_SESSION['nim'])) {
        header('Location: '. BASEURL .'/middleware/notify');
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

            <h3 class="pt-4 text-uppercase border-bottom text-center">DATA DIRI MAHASISWA</h3>

            <form action="<?= BASEURL; ?>/auth/registerStore" method="POST" class="pb-5 pt-3">
                <div class="mb-3">
                    <label for="nim" class="form-label">Nim</label>
                    <input type="text" class="form-control" id="nim" name="nim" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="fakultas" class="form-label">Fakultas</label>
                    <input type="text" class="form-control" id="fakultas" name="fakultas" required>
                </div>
                <div class="mb-3">
                    <label for="angkatan" class="form-label">Angkatan</label>
                    <input type="number" class="form-control" id="angkatan" name="angkatan" required>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" id="Laki-laki" value="Laki-laki">
                        <label class="form-check-label" for="Laki-laki">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" id="Perempuan" value="Perempuan">
                        <label class="form-check-label" for="Perempuan">
                            Perempuan
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="umur" class="form-label">Umur</label>
                    <input type="number" class="form-control" id="umur" name="umur" required>
                </div>
                
                <div class="mb-5">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>
            
        </div>
    </div>

</div>
