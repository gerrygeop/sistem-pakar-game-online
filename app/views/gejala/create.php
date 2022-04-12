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
            <h3 class="text-secondary">#Tambah Data Gejala</h3>
        </div>
    </div>

    <div class="px-5 py-3 rounded">
        <form action="<?= BASEURL; ?>/gejala/store" method="POST">
        
            <div class="row gy-5">
                <div class="col-12">
                    <label for="id_gejala" class="form-label text-secondary">ID Gejala</label>
                    <input type="text" class="form-control" id="id_gejala" name="id_gejala" autofocus required>
                </div>

                <div class="col-12">
                    <label for="gejala" class="form-label text-secondary">Gejala</label>
                    <textarea class="form-control" id="gejala" name="gejala" autofocus required></textarea>
                </div>

                <div class="col-12">
                    <label for="tingkatan" class="form-label text-secondary">Tingkatan</label>
                    <select class="form-select" name="tingkatan">
                        <?php foreach ($data['solusi'] as $value): ?>
                            <option value="<?= $value['id_solusi'] ?>">
                                <?= $value['level_gejala'] ?>
                            </option>
                        <?php endforeach?>
                    </select>
                </div>

                <div class="col-12">
                    <label for="MB" class="form-label text-secondary">MB</label>
                    <input type="text" class="form-control" id="MB" name="MB" autofocus required>
                </div>

                <div class="col-12">
                    <label for="MD" class="form-label text-secondary">MD</label>
                    <input type="text" class="form-control" id="MD" name="MD" autofocus required>
                </div>
            </div>
    
            <div class="row mt-5">
                <div class="col-12">
                    <a href="<?= BASEURL; ?>/gejala/index" class="btn btn-outline-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>
    </div>

</div>