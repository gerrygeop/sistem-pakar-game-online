<?php

class Data_penyakit extends Controller {

    public function index()
    {
        $data['judul'] = 'Data Penyakit';
        $data['solusi'] = $this->model('DataPenyakitModel')->getAll();

        $this->view('templates/header', $data);
        $this->view('data_penyakit/index', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        $data['judul'] = 'Data Penyakit';

        $this->view('templates/header', $data);
        $this->view('data_penyakit/create');
        $this->view('templates/footer');
    }

    public function datapenyakitStore()
    {
        if ( empty($_POST['level_gejala']) && empty($_POST['solusi']) ) 
        {
            Flasher::setAlert('Pastikan data sudah terisi dengan benar!', 'danger');
            header('Location: ' . BASEURL . '/data_penyakit/create');
            exit;
        }

        if ( $this->model('DataPenyakitModel')->storeData($_POST) > 0 ) {
            Flasher::setFlash('Berhasil', 'Disimpan', 'success');
            header('Location: ' . BASEURL . '/data_penyakit');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Disimpan', 'danger');
            header('Location: ' . BASEURL . '/data_penyakit/create');
            exit;
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Data Penyakit';
        $data['solusi'] = $this->model('DataPenyakitModel')->getID($id);

        $this->view('templates/header', $data);
        $this->view('data_penyakit/edit', $data);
        $this->view('templates/footer');
    }

    public function update($id)
    {
        if ( empty($_POST['level_gejala']) && empty($_POST['solusi']) ) 
        {
            Flasher::setAlert('Pastikan data sudah terisi dengan benar!', 'danger');
            header('Location: ' . BASEURL . '/data_penyakit/edit');
            exit;
        }

        if ($this->model('DataPenyakitModel')->updateSolusi($_POST, $id) > 0) {
            Flasher::setFlash('Berhasil', 'Diedit', 'success');
            header('Location: ' . BASEURL . '/data_penyakit');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Diedit', 'danger');
            header('Location: ' . BASEURL . '/data_penyakit/edit');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('DataPenyakitModel')->hapusSolusi($id) > 0) {
            Flasher::setFlash('Berhasil', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/data_penyakit');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Dihapus', 'danger');
            header('Location: ' . BASEURL . '/data_penyakit');
            exit;
        }
    }

}