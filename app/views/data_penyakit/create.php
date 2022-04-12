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

<div class="container px-5 py-3 mb-5 bg-white shadow-sm border rounded">

    <div class="row my-3 px-5">
        <div class="col-12">
            <h3 class="text-secondary">#Tambah Data Penyakit & Solusi</h3>
        </div>
    </div>

    <div class="px-5 py-3 rounded">
        <form action="<?= BASEURL; ?>/data_penyakit/datapenyakitStore" method="POST">

            <div class="row gy-5">
                <div class="col-12">
                    <label for="level_gejala" class="form-label text-secondary">Tingkatan Gejala</label>
                    <input type="text" class="form-control" id="level_gejala" name="level_gejala" required>
                </div>
                <div class="col-12">
                    <label for="solusi" class="form-label text-secondary">Solusi</label>
                    <textarea  class="form-control" id="solusi" name="solusi" required></textarea>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <a href="<?= BASEURL; ?>/data_penyakit/index" class="btn btn-outline-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>

</div>
