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

    <a href="<?= BASEURL; ?>/admin/laporanDataUser" class="btn btn-outline-secondary me-2">Kembali</a>

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
                    <?php if ( $data['laporan']['nilai_akhir'] <= 33.9 ) : ?>
                        <div class="card-body bg-warning">
                            <h5 class="card-title">
                                <?= $data['solusi'][0]['level_gejala'] ?>
                            </h5>
                            <h5 class="card-title">
                                <?= $data['laporan']['nilai_akhir'] ?>
                            </h5>
                        </div>

                    <?php elseif ( $data['laporan']['nilai_akhir'] >= 34 && $data['laporan']['nilai_akhir'] <= 67.9) : ?>
                        <div class="card-body text-white" style="background-color: #ff8906;">
                            <h5 class="card-title">
                                <?= $data['solusi'][1]['level_gejala'] ?>
                            </h5>
                            <h5 class="card-title">
                                <?= $data['laporan']['nilai_akhir'] ?>
                            </h5>
                        </div>

                    <?php else : ?>
                        <div class="card-body bg-danger text-white">
                            <h5 class="card-title">
                                <?= $data['solusi'][2]['level_gejala'] ?>
                            </h5>
                            <h5 class="card-title">
                                <?= $data['laporan']['nilai_akhir'] ?>
                            </h5>
                        </div>

                    <?php endif; ?>
                </div>
            </div>

            <div class="card text-center">
                <div class="card-header">
                    Solusi
                </div>

                <?php if ( $data['laporan']['nilai_akhir'] <= 33.9 ) : ?>
                    <div class="card-body bg-warning">
                        <h5 class="card-title">
                            <?= $data['solusi'][0]['solusi'] ?>
                        </h5>
                    </div>

                <?php elseif ( $data['laporan']['nilai_akhir'] >= 34 && $data['laporan']['nilai_akhir'] <= 67.9) : ?>
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

    <div class="row my-5">
        <div class="col-8 ms-auto px-2 py-2 bg-white border rounded">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Gejala</th>
                            <th scope="col">Enterpretasi nilai CF</th>
                            <th scope="col">CF sequencial</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ( $data['riwayatResponden'] as $key => $value ) : ?>
                            <tr 
                                <?php 
                                    if ( $value['tingkatan'] == 1 ) {
                                        echo 'class="bg-warning"';
                                    } elseif ( $value['tingkatan'] == 2) {
                                        echo 'class="bg-orange"';
                                    } else {
                                        echo 'class="bg-danger"';
                                    }
                                ?>
                            >
                                <td>
                                    <?= $value['gejala'] ?>
                                </td>
                                <td>
                                    <?= $value['r_cf'] ?>
                                </td>
                                <td>
                                    <?= $value['H'] ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div class="row my-5">
        <div class="col-8 ms-auto px-2 pb-2 pt-3 bg-white border rounded">
            <h4>CF gabungan</h4>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Kategori</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ( $data['nilaiH']['combin'] as $key => $combin ) : ?>
                            <tr>
                                <?php if ( $key == 1 ) : ?>
                                    <th class="bg-warning">Ringan</th>
                                <?php elseif ( $key == 2 ) : ?>
                                    <th style="background-color: #ff8906;">Sedang</th>
                                <?php else : ?>
                                    <th class="bg-danger">Berat</th>
                                <?php endif; ?>

                                <?php foreach ( $combin as $value_combin ) : ?>
                                    <td>
                                        <?= $value_combin ?>
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>

                        <tr class="align-middle">
                            <th scope="row">Hasil</th>
                            <th 
                                colspan="5"
                                <?php 
                                    if ( $data['nilaiH']['hasilBagiSeratus'] <=33.9 ) {
                                        echo 'class="bg-warning"';
                                    } elseif ( $data['nilaiH']['hasilBagiSeratus'] >= 34 && $data['nilaiH']['hasilBagiSeratus'] <= 67.9) {
                                        echo 'style="background-color: #ff8906;"';
                                    } else {
                                        echo 'class="bg-danger"';
                                    }
                                ?>
                            >
                                <p class="text-center pt-3">
                                    <?= $data['nilaiH']['hasilBagiSeratus'] ?>
                                </p>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
