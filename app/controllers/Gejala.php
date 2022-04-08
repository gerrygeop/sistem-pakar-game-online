<?php

class Gejala extends Controller {

    public function index()
    {
        $data['judul'] = 'Data Gejala';
        $data['gejala'] = $this->model('GejalaModel')->getAll();

        $this->view('templates/header', $data);
        $this->view('gejala/index', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        $data['judul'] = 'Data Gejala';
        $data['solusi'] = $this->model('DataPenyakitModel')->getAll();

        $this->view('templates/header', $data);
        $this->view('gejala/create', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        if (
            empty($_POST['id_gejala']) ||
            empty($_POST['gejala']) ||
            empty($_POST['tingkatan']) ||
            empty($_POST['MB']) ||
            empty($_POST['MD'])
        ) {

            die('Pastikan seluruh data sudah terisi dengan benar');
        }

        if ( $this->model('GejalaModel')->storeData($_POST) > 0 ) {
            Flasher::setFlash('Berhasil', 'Disimpan', 'success');
            header('Location: ' . BASEURL . '/gejala/index');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Disimpan', 'danger');
            header('Location: ' . BASEURL . '/gejala/index');
            die('Kayaknye password salah');
        }
    }

    public function delete($id)
    {
        if ($this->model('GejalaModel')->hapusGejala($id) > 0) {
            Flasher::setFlash('Berhasil', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/gejala/index');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Dihapus', 'danger');
            header('Location: ' . BASEURL . '/gejala/index');
            exit;
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Data Penyakit';
        $data['gejala'] = $this->model('GejalaModel')->getID($id);
        $data['solusi'] = $this->model('DataPenyakitModel')->getAll();

        $this->view('templates/header', $data);
        $this->view('gejala/edit', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        if ($this->model('GejalaModel')->updateGejala($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Diedit', 'success');
            header('Location: ' . BASEURL . '/gejala/index');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Diedit', 'danger');
            header('Location: ' . BASEURL . '/gejala/index');
            exit;
        }
    }

}