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

    <a href="<?= BASEURL; ?>/responden/riwayat" class="btn btn-outline-secondary me-2">Kembali</a>

    <div class="row my-5">
        <div class="col-4">
            <div class="bg-white px-2 py-2 border rounded">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Kategori</th>
                            <th scope="col">Interval</th>
                            <th scope="col">% Interval</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-warning">
                            <td>Ringan</td>
                            <td>0 - 33</td>
                            <td>=< 33%</td>
                        </tr>
                        <tr class="bg-orange">
                            <td>Sedang</td>
                            <td>34 - 67</td>
                            <td>34% - 67%</td>
                        </tr>
                        <tr class="bg-danger">
                            <td>Berat</td>
                            <td>68 - 100</td>
                            <td>>= 68%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-8 px-3 py-5 bg-white border rounded">
            <div class="card text-center mb-5">
                <div class="card-header">
                    Tingkat Kecanduan
                </div>

                <div class="card-body">
                    <?php if ( $data['nilaiH']['hasilBagiSeratus'] <= 33.9 ) : ?>
                        <div class="card-body bg-warning">
                            <h5 class="card-title">
                                <?= $data['solusi'][0]['level_gejala'] ?>
                            </h5>
                            <h5 class="card-title">
                                <?= $data['nilaiH']['hasilBagiSeratus'] ?>
                            </h5>
                        </div>

                    <?php elseif ( $data['nilaiH']['hasilBagiSeratus'] >= 34 && $data['nilaiH']['hasilBagiSeratus'] <= 67.9) : ?>
                        <div class="card-body bg-orange text-white">
                            <h5 class="card-title">
                                <?= $data['solusi'][1]['level_gejala'] ?>
                            </h5>
                            <h5 class="card-title">
                                <?= $data['nilaiH']['hasilBagiSeratus'] ?>
                            </h5>
                        </div>

                    <?php else : ?>
                        <div class="card-body bg-danger text-white">
                            <h5 class="card-title">
                                <?= $data['solusi'][2]['level_gejala'] ?>
                            </h5>
                            <h5 class="card-title">
                                <?= $data['nilaiH']['hasilBagiSeratus'] ?>
                            </h5>
                        </div>

                    <?php endif; ?>
                </div>
            </div>

            <div class="card text-center">
                <div class="card-header">
                    Solusi
                </div>

                <?php if ( $data['nilaiH']['hasilBagiSeratus'] <=33.9 ) : ?>
                    <div class="card-body bg-warning">
                        <h5 class="card-title">
                            <?= $data['solusi'][0]['solusi'] ?>
                        </h5>
                    </div>

                <?php elseif ( $data['nilaiH']['hasilBagiSeratus'] >= 34 && $data['nilaiH']['hasilBagiSeratus'] <= 67.9) : ?>
                    <div class="card-body bg-orange text-white">
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
