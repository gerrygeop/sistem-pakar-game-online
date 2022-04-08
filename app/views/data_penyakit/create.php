<?php
    if (!isset($_SESSION['nim'])) {
        header('Location: '. BASEURL .'/middleware');
        exit;
    }
    if ($_SESSION['level'] != 'admin') {
        header('Location: '. BASEURL .'/middleware/checkout');
        exit;
    }
   
?>

<div class="container">
    <div class="row">
        <div class="col-11 col-md-8 col-lg-6 mx-auto mt-5 px-3 px-md-5 bg-white shadow-sm border rounded">
            <h3 class="pt-4 text-uppercase border-bottom text-center">DATA PENYAKIT</h3>
            <form action="<?= BASEURL; ?>/data_penyakit/datapenyakitStore" method="POST" class="pb-5 pt-3">
                <div class="mb-3">
                    <label for="level_gejala" class="form-label">Tingkatan Gejala</label>
                    <input type="text" class="form-control" id="level_gejala" name="level_gejala" required>
                </div>
                <div class="mb-3">
                    <label for="solusi" class="form-label">Solusi</label>
                    <textarea  class="form-control" id="solusi" name="solusi" required></textarea>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <a href="<?= BASEURL; ?>/data_penyakit/index" class="btn btn-outline-secondary w-100 mb-3">Batal</a>
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
