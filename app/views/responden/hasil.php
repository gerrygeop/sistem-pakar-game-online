<?php
    if (!isset($_SESSION['nim'])) {
        header('Location: '. BASEURL .'/middleware');
        exit;
    }
    if ($_SESSION['level'] != 'mahasiswa') {
        header('Location: '. BASEURL .'/middleware/checkout');
        exit;
    }
   $no = 0;
?>
        
<div class="container">

    <div class="row">
        <div class="col-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <a href="<?= BASEURL; ?>/home/index" class="btn btn-outline-secondary me-2">Kembali</a>

    <div class="row my-5">
        <div class="col-4">
            <div class="bg-white px-2 py-2 border rounded">
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item col">NIM</li>
                    <li class="list-group-item col"><?= $data['mhs']['nim'] ?></li>
                </ul>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item col">Nama</li>
                    <li class="list-group-item col"><?= $data['mhs']['nama'] ?></li>
                </ul>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item col">Fakultas</li>
                    <li class="list-group-item col"><?= $data['mhs']['fakultas'] ?></li>
                </ul>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item col">Angkatan</li>
                    <li class="list-group-item col"><?= $data['mhs']['angkatan'] ?></li>
                </ul>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item col">Jenis Kelamin</li>
                    <li class="list-group-item col"><?= $data['mhs']['jk'] ?></li>
                </ul>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item col">Umur</li>
                    <li class="list-group-item col"><?= $data['mhs']['umur'] ?></li>
                </ul>
            </div>
        </div>

        <div class="col-8 px-3 py-5 bg-white border rounded">
            <div class="card text-center mb-5">
                <div class="card-header">
                    Tingkat Kecanduan
                </div>

                <div class="card-body">
                    <?php if ( $data['nilaiH'] <=33.9 ) : ?>
                        <div class="card-body bg-warning">
                            <h5 class="card-title">
                                <?= $data['solusi'][0]['level_gejala'] ?>
                            </h5>
                            <h5 class="card-title">
                                <?= $data['nilaiH'] ?>
                            </h5>
                        </div>

                    <?php elseif ( $data['nilaiH'] >= 34 && $data['nilaiH'] <= 67.9) : ?>
                        <div class="card-body text-white" style="background-color: #ff8906;">
                            <h5 class="card-title">
                                <?= $data['solusi'][1]['level_gejala'] ?>
                            </h5>
                            <h5 class="card-title">
                                <?= $data['nilaiH'] ?>
                            </h5>
                        </div>

                    <?php else : ?>
                        <div class="card-body bg-danger text-white">
                            <h5 class="card-title">
                                <?= $data['solusi'][2]['level_gejala'] ?>
                            </h5>
                            <h5 class="card-title">
                                <?= $data['nilaiH'] ?>
                            </h5>
                        </div>

                    <?php endif; ?>
                </div>
            </div>

            <div class="card text-center">
                <div class="card-header">
                    Solusi
                </div>

                <?php if ( $data['nilaiH'] <=33.9 ) : ?>
                    <div class="card-body bg-warning">
                        <h5 class="card-title">
                            <?= $data['solusi'][0]['solusi'] ?>
                        </h5>
                    </div>

                <?php elseif ( $data['nilaiH'] >= 34 && $data['nilaiH'] <= 67.9) : ?>
                    <div class="card-body text-white" style="background-color: #ff8906;">
                        <h5 class="card-title">
                            <?= $data['solusi'][1]['solusi'] ?>
                        </h5>
                    </div>

                <?php else : ?>
                    <div class="card-body bg-danger text-white">
                        <h5 class="card-title">
                            <?= $data['solusi'][2]['solusi'] ?>
                        </h5>
                    </div>

                <?php endif; ?>
            </div>
        </div>

    </div>
</div>
