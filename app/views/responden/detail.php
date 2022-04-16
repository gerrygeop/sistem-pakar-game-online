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

    <!-- Button Section -->
    <div class="d-print-none mb-5 d-flex">
        <a href="<?= BASEURL; ?>/responden/riwayat" class="btn btn-outline-secondary me-2">Kembali</a>
        <button class="btn btn-outline-primary d-flex align-items-center" onclick="printPage()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill me-1" viewBox="0 0 16 16">
                <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
            </svg>
            <span>Print</span>
        </button>
    </div>

    <div class="row mb-5">
        <!-- Tabel Keterangan -->
        <div class="col-12 col-lg-4 p-0 pe-lg-2 ps-lg-2 mb-5 m-lg-0">
            <div class="bg-white px-2 py-2 border rounded">
                <h5 class="px-2 pt-2 text-decoration-underline">Keterangan</h5>

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

        <div class="col-12 col-lg-8 px-3 py-5 bg-white border rounded">
            <!-- Tingkat Kecanduan -->
            <div class="card text-center mb-5">
                <div class="card-header">Tingkat Kecanduan</div>

                <div class="card-body <?= $data['h']['class'] ?>">
                    <h5 class="card-title">
                        <?= $data['h']['level_gejala'] ?>
                    </h5>
                    <h5 class="card-title">
                        <?= $data['nilaiH']['hasilBagiSeratus'] ?>
                    </h5>
                </div>
            </div>

            <!-- Solusi -->
            <div class="card text-center">
                <div class="card-header">Solusi</div>

                <div class="card-body <?= $data['h']['class'] ?>">
                    <h5 class="card-title">
                        <?= $data['h']['solusi'] ?>
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel nilai CF -->
    <div class="row mb-5">
        <div class="col-12 col-lg-8 ms-auto px-2 py-2 bg-white border rounded">

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
                                <?php if ( $value['tingkatan'] == 1 ) : ?>
                                        class="bg-warning"
                                <?php elseif ( $value['tingkatan'] == 2) : ?>
                                        class="bg-orange"
                                <?php else : ?>
                                        class="bg-danger"
                                <?php endif; ?>
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

    <div class="row mb-5">
        <!-- Tabel nilai CF gabungan -->
        <div class="col-12 col-lg-8 ms-auto px-2 pb-2 pt-3 bg-white border rounded">
            <h5 class="px-2 pt-2 text-decoration-underline">CF gabungan</h5>

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
                                class="<?= $data['h']['class'] ?>"
                                <?= $data['h']['style'] ?>
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

<script>
    function printPage() {
        window.print();
    }
</script>