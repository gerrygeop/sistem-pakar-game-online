<?php
    if (!isset($_SESSION['nim'])) {
        header('Location: '. BASEURL .'/middleware');
        exit;
    }
    if ($_SESSION['level'] != 'mahasiswa') {
        header('Location: '. BASEURL .'/middleware/checkout');
        exit;
    }
?>

<div class="container">

    <div class="row">
        <div class="col-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <a href="<?= BASEURL; ?>/home/index" class="btn btn-outline-secondary me-2">Kembali</a>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <h1>RIWAYAT KONSULTASI</h1>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nilai Akhir</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['riwayat'] as $riwayat): ?>
                    <tr>
                        <td><?= $riwayat['id_hasil']; ?> </td>
                        <td><?= $riwayat['nilai_akhir']; ?></td>
    
                        <td>
                            <?php foreach ( $data['solusi'] as $solusi ) : ?>
                                <?php if ( $riwayat['id_solusi'] == $solusi['id_solusi'] ) : ?>
                                    <span class="badge <?= $solusi['color']; ?>">
                                        <?= $solusi['level_gejala']; ?>
                                    </span>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
    
                        <td><?= $riwayat['timestamp']; ?></td>
    
                        <td>
                            <a href="<?= BASEURL; ?>/responden/detail/<?= $riwayat['record']; ?>" class="btn btn-outline-primary btn-sm">Detail</a>
                        </td>
                    </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>
        
</div>
