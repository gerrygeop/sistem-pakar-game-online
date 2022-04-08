<?php

class Responden extends Controller {

  public function index()
  {
    $data['judul'] = 'Konsultasi';
    $data['getGejala'] = $this->model('RespondenModel')->getGejala();
    

    $this->view('templates/header', $data);
    $this->view('responden/index', $data);
    $this->view('templates/footer');
  }

  public function store()
  {
    if ($this->model('RespondenModel')->tambahResponden($_POST)) {
      Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
      header('Location: ' . BASEURL . '/responden/hasilcf');
      exit;
    } else {
      Flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
      header('Location: ' . BASEURL . '/responden');
      exit;
    }
  }

  public function hasilcf()
  {
    $data['judul'] = 'Hasil Perhitungan';
    $data['nilaiH'] = $this->model('RespondenModel')->hasilCF();
    $data['solusi'] = $this->model('DataPenyakitModel')->getAll();
    $data['mhs'] = $this->model('UserModel')->getUserID($_SESSION['nim']);

    $this->model('RespondenModel')->simpanHasil($data['nilaiH'], $data['solusi']);

    $this->view('templates/header', $data);
    $this->view('responden/hasil', $data);
    $this->view('templates/footer');
  }

  public function riwayat()
  {
    $data['judul'] = 'Riwayat Konsultasi';
    $data['riwayat'] = $this->model('RespondenModel')->getRiwayat();
    $data['solusi'] = $this->model('DataPenyakitModel')->getAll();

    $this->view('templates/header', $data);
    $this->view('responden/riwayat', $data);
    $this->view('templates/footer');
  }

  public function detail($record)
  {
    $data['judul'] = 'Detail Konsultasi';
    $data['riwayat'] = $this->model('RespondenModel')->detailRiwayat($record);
    $data['nilaiH'] = $this->model('RespondenModel')->detailRiwayatPerhitungan($record);
    $data['solusi'] = $this->model('DataPenyakitModel')->getAll();

    $this->view('templates/header', $data);
    $this->view('responden/detail', $data);
    $this->view('templates/footer');
  }

  //   public function delete($id)
  //   {
  //       if ($this->model('DataPenyakitModel')->hapusSolusi($id) > 0) {
  //           Flasher::setFlash('Berhasil', 'Dihapus', 'success');
  //           header('Location: ' . BASEURL . '/data_penyakit/index');
  //           exit;
  //       } else {
  //           Flasher::setFlash('Gagal', 'Dihapus', 'danger');
  //           header('Location: ' . BASEURL . '/data_penyakit/index');
  //           exit;
  //       }
  //   }

  // public function edit($id)
  //   {
  //       $data['judul'] = 'Data Penyakit';
  //       $data['solusi'] = $this->model('DataPenyakitModel')->getID($id);

  //       $this->view('templates/header', $data);
  //       $this->view('data_penyakit/edit', $data);
  //       $this->view('templates/footer');
  //   }

  //     public function update()
  //   {
  //       if ($this->model('DataPenyakitModel')->updateSolusi($_POST) > 0) {
  //           Flasher::setFlash('Berhasil', 'Diedit', 'success');
  //           header('Location: ' . BASEURL . '/data_penyakit/index');
  //           exit;
  //       } else {
  //           Flasher::setFlash('Gagal', 'Diedit', 'danger');
  //           header('Location: ' . BASEURL . '/data_penyakit/index');
  //           exit;
  //       }
  //   }

}