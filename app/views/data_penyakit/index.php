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
        <div class="col-6">
            <?php Flasher::flash(); ?>
            <?php Flasher::alert(); ?>
        </div>
    </div>

    <a href="<?= BASEURL; ?>/home/index" class="btn btn-outline-secondary me-2">Kembali</a>
    <a href="<?= BASEURL; ?>/data_penyakit/create" class="btn btn-primary">Tambah Data</a>

    <div class="table-responsive my-5">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Tingkatan</th>
                    <th>Solusi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['solusi'] as $value): ?>
                    <tr>
                        <td><?= $value['id_solusi']; ?></td>
                        <td><?= $value['level_gejala']; ?></td>
                        <td><?= $value['solusi']; ?></td>

                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <a
                                    href="<?= BASEURL; ?>/data_penyakit/edit/<?= $value['id_solusi']; ?>"
                                    class="btn btn-primary btn-sm pt-0 me-1"
                                    title="Edit"
                                >
                                    <i class="bi bi-pencil-square"></i>
                                </a>
        
                                <form action="<?= BASEURL; ?>/data_penyakit/delete/<?= $value['id_solusi']; ?>" method="POST">
                                    <button
                                        class="btn btn-danger btn-sm pt-0"
                                        onclick="return confirm('Yakin?');"
                                        title="Hapus"
                                    >
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>
</div>
