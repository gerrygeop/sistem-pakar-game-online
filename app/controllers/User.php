<?php

class User extends Controller {

   
    public function profile()
    {
        $data['judul'] = 'Data Mahasiswa';
        $data['user'] = $this->model('UserModel')->getUserByNIM($_SESSION['nim']);
        
        $this->view('templates/header', $data);
        $this->view('auth/edit', $data);
        $this->view('templates/footer');
    }
    public function update()
    {
        if ($this->model('UserModel')->updateUser($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Diedit', 'success');
            header('Location: ' . BASEURL . '/home/index');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Diedit', 'danger');
            header('Location: ' . BASEURL . '/home/index');
            exit;
        }
    }
}