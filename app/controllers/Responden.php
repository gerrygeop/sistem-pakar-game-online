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
    $data['mhs'] = $this->model('UserModel')->getUserByNIM($_SESSION['nim']);
    // return var_dump($data['solusi']);
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
    $data['riwayatResponden'] = $this->model('RespondenModel')->getCFAndHResponden($record);
    $data['nilaiH'] = $this->model('RespondenModel')->detailRiwayatPerhitungan($record);
    $data['solusi'] = $this->model('DataPenyakitModel')->getAll();

    $data['h'] = $this->checkNilaiH($data['nilaiH'], $data['solusi']);

    $this->view('templates/header', $data);
    $this->view('responden/detail', $data);
    $this->view('templates/footer');
  }

  protected function checkNilaiH($nilaiH, $solusi)
  {
    if ( $nilaiH['hasilBagiSeratus'] < 34 )
    {
      return [
        'level_gejala' => $solusi[0]['level_gejala'],
        'solusi' => $solusi[0]['solusi'],
        'class' => 'bg-warning',
        'style' => ''
      ];
    }
    
    if ( $nilaiH['hasilBagiSeratus'] >= 34 && $nilaiH['hasilBagiSeratus'] <= 68 )
    {
      return [
        'level_gejala' => $solusi[1]['level_gejala'],
        'solusi' => $solusi[1]['solusi'],
        'class' => 'bg-orange text-white',
        'style' => 'style="background-color: #ff8906;"'
      ];
    }
    
    if ( $nilaiH['hasilBagiSeratus'] > 68 ) 
    {
      return [
        'level_gejala' => $solusi[2]['level_gejala'],
        'solusi' => $solusi[2]['solusi'],
        'class' => 'bg-danger text-white',
        'style' => ''
      ];
    }
    
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