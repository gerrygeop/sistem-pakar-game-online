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

    <div class="row my-5 px-3 py-5 bg-white border rounded">
        <div class="col">
            <p style="text-align: justify;">
                &emsp;&emsp;Selamat datang di Sistem Pakar Diagnosis Awal Tingkat Kecanduan Game Online Menggunakan Mesin Inferensi Forward Chaining Dengan Metode Certainty Factor. Dibawah ini teman-teman akan diberikan beberapa pertanyaan terkait kecanduan terhadap game online. Jawaban dapat diberikan dengan memilih salah satu dari angka pada sisi pertanyaan sesuai dengan karakter teman-teman sendiri. Adapun range jawaban sebagai berikut :
            </p>
            <ol>
                <li style="text-align: justify;">Nilai 0 berarti Sangat Tidak Setuju (STS). Bobot nilai CF adalah 0</li>
                <li style="text-align: justify;">Nilai 1 berarti Tidak Setuju (TS). Bobot nilai CF adalah 0,4</li>
                <li style="text-align: justify;">Nilai 2 berarti Netral (N). Bobot nilai CF adalah 0,6</li>
                <li style="text-align: justify;">Nilai 3 berarti Setuju (S). Bobot nilai CF adalah 0,8</li>
                <li style="text-align: justify;">Nilai 5 berarti Sangat Setuju (SS). Bobot nilai CF adalah 1,0</li>
            </ol>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
              <h1>PILIH GEJALA</h1>
            </div>
        </div>
    </div>

    <form action="<?= BASEURL; ?>/responden/store" method="POST">
    
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Gejala</th>
                    <th colspan="5">Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['getGejala'] as $value): ?>
                    <tr>
                        <td><?= $no += '1'; ?> </td>
                        <td><?= $value['gejala']; ?></td>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="<?= $value['id_gejala']; ?>" id="inlineRadio1" value="0">
                                <label class="form-check-label" for="inlineRadio1">0</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="<?= $value['id_gejala']; ?>" id="inlineRadio2" value="0.4">
                                <label class="form-check-label" for="inlineRadio2">1</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="<?= $value['id_gejala']; ?>" id="inlineRadio3" value="0.6">
                                <label class="form-check-label" for="inlineRadio3">2</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="<?= $value['id_gejala']; ?>" id="inlineRadio4" value="0.8">
                                <label class="form-check-label" for="inlineRadio4">3</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="<?= $value['id_gejala']; ?>" id="inlineRadio5" value="1">
                                <label class="form-check-label" for="inlineRadio5">4</label>
                            </div>
                        </td>
                    </tr>
                <?php endforeach?>
            </tbody>
        </table>

        <div class="d-grid gap-2 col-6 mx-auto mb-5">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>
