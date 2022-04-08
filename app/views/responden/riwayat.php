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
                <?php foreach ($data['riwayat'] as $value): ?>
                    <tr>
                        <td><?= $value['id_hasil']; ?> </td>
                        <td><?= $value['nilai_akhir']; ?></td>
    
                        <td>
                            <?php if ( $value['id_solusi'] == $data['solusi'][0]['id_solusi'] ) : ?>
                                <span class="badge bg-warning">
                                    <?= $data['solusi'][0]['id_solusi']; ?>
                                </span>
    
                            <?php elseif ( $value['id_solusi'] == $data['solusi'][1]['id_solusi'] ) : ?>
                                <span class="badge" style="background-color: #ff8906;">
                                    <?= $data['solusi'][1]['level_gejala']; ?>
                                </span>
    
                            <?php else : ?>
                                <span class="badge bg-danger">
                                    <?= $data['solusi'][2]['level_gejala']; ?>
                                </span>
    
                            <?php endif; ?>
                        </td>
    
                        <td><?= $value['timestamp']; ?></td>
    
                        <td>
                            <a href="<?= BASEURL; ?>/responden/detail/<?= $value['record']; ?>" class="btn btn-outline-primary btn-sm">Detail</a>
                        </td>
                    </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>
        
</div>
