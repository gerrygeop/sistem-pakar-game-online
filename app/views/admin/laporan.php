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
        </div>
    </div>

    <a href="<?= BASEURL; ?>/home/index" class="btn btn-outline-secondary me-2">Kembali</a>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-auto text-uppercase">
                <h2>laporan data user</h2>
            </div>
        </div>
    </div>

    <div class="row my-3">
        <div class="col col-md-6">
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </span>
                <input type="text" class="form-control" placeholder="Cari berdasarkan NIM" id="myInput" onkeyup="myFunction()">
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nilai Akhir</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php foreach ($data['laporan'] as $value): ?>
                    <tr>
                        <td><?= $value['id_hasil']; ?> </td>
                        <td><?= $value['nim']; ?></td>
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
    
                        <td class="d-flex">
                            <a 
                                href="<?= BASEURL; ?>/admin/detailLaporanDataUser/<?= $value['nim']; ?>/<?= $value['record']; ?>" 
                                class="btn btn-outline-primary btn-sm me-1"
                            >
                                Detail
                            </a>

                            <form action="<?= BASEURL; ?>/admin/delete/<?= $value['id_hasil']; ?>" method="POST">
                                <button
                                    class="btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Yakin?');"
                                >
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>
        
</div>

<script>
    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value;
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>