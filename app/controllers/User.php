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
        if ($this->model('UserModel')->updateProfileUser($_POST) > 0) {
            Flasher::setAlert('Data Profile Berhasil di Update', 'success');
            header('Location: ' . BASEURL . '/user/profile');
            exit;
        } else {
            Flasher::setAlert('Data Profile Gagal di Update', 'danger');
            header('Location: ' . BASEURL . '/user/profile');
            exit;
        }
    }

    public function updatePassword()
    {
        $nim = intval( $_SESSION['nim'] );
        $checkOldPassword = $this->model('UserModel')->loginUser($nim, $_POST['password']);

        if (!$checkOldPassword) {
            Flasher::setAlert('Password Lama Anda Salah!', 'danger');
            header('Location: ' . BASEURL . '/user/profile');
            exit;

        } else {

            if ($_POST['new_password'] == $_POST['confirm_password']) {

                if ($this->model('UserModel')->updatePasswordUser($_POST['new_password'], $nim) > 0) {
                    Flasher::setAlert('Password Anda Berhasil di Update', 'success');
                    header('Location: ' . BASEURL . '/user/profile');
                    exit;

                } else {
                    Flasher::setAlert('Password Gagal di Update!', 'danger');
                    header('Location: ' . BASEURL . '/user/profile');
                    exit;
                }

            } else {
                Flasher::setAlert('Konfirmasi Password Salah!', 'danger');
                header('Location: ' . BASEURL . '/user/profile');
                exit;
            }
        }
    }
}