

<div class="container px-5 py-3 mb-5 bg-white shadow-sm border rounded">

    <div class="row my-3 px-5">
        <div class="col-12">
            <h3 class="text-secondary">>Edit Data</h3>
        </div>
    </div>

    <div class="px-5 py-3 rounded">
        <form action="<?= BASEURL; ?>/user/update"  method="POST">
        
            <div class="row gy-5">

                <div class="mb-3">
                    <label for="nim" class="form-label">Nim</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="<?= $data['user']['nim'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['user']['nama'] ?>"required>
                </div>
                <div class="mb-3">
                    <label for="fakultas" class="form-label">Fakultas</label>
                    <input type="text" class="form-control" id="fakultas" name="fakultas" value="<?= $data['user']['fakultas'] ?>"required>
                </div>
                <div class="mb-3">
                    <label for="angkatan" class="form-label">Angkatan</label>
                    <input type="number" class="form-control" id="angkatan" name="angkatan" value="<?= $data['user']['angkatan'] ?>"required>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" id="Laki-laki" value="Laki-laki" <?= $data['user']['jk'] == 'Laki-laki' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="Laki-laki" >
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" id="Perempuan" value="Perempuan" <?= $data['user']['jk'] == 'Perempuan' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="Perempuan">
                            Perempuan
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="umur" class="form-label">Umur</label>
                    <input type="number" class="form-control" id="umur" name="umur" value="<?= $data['user']['umur'] ?>"required>
                </div>
                
                <div class="mb-5">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

            </div>
    
            <div class="row mt-5">
                <div class="col-12">
                    <a href="<?= BASEURL; ?>/home/index" class="btn btn-outline-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>

</div>