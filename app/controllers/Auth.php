<?php

class Auth extends Controller
{

    public function index()
    {
        $data['judul'] = 'Login';
        $data['login'] = 'mhs';

        $this->view('templates/header', $data);
        $this->view('auth/login', $data);
        $this->view('templates/footer');
    }
    public function adminLogin()
    {
        $data['judul'] = 'Login';
        $data['login'] = 'admin';

        $this->view('templates/header', $data);
        $this->view('auth/login', $data);
        $this->view('templates/footer');
    }

    public function loginMahasiswa()
    {
        if (empty($_POST['nim']) || empty($_POST['password'])) {
            Flasher::setAlert('NIM dan Password tidak boleh kosong!', 'danger');
            header('Location: ' . BASEURL . '/auth');
            exit;
        } else {
            $loginUser = $this->model('UserModel')->loginUser($_POST['nim'], $_POST['password']);

            if (!$loginUser) {
                Flasher::setAlert('NIM atau Password Salah!', 'danger');
                header('Location: ' . BASEURL . '/auth');
                exit;
            } else {
                $this->createUserSession($loginUser);
            }
        }
    }

    public function loginAdmin()
    {
        if (empty($_POST['nim']) || empty($_POST['password'])) {
            Flasher::setAlert('NIM dan Password tidak boleh kosong!', 'danger');
            header('Location: ' . BASEURL . '/auth/adminLogin');
            exit;
        } else {
            $loginUser = $this->model('UserModel')->loginAdmin($_POST['nim'], $_POST['password']);

            if (!$loginUser) {
                Flasher::setAlert('NIM atau Password Salah!', 'danger');
                header('Location: ' . BASEURL . '/auth/adminLogin');
                exit;
            } else {
                $this->createUserSession($loginUser);
            }
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['nim'] = $user['nim'];
        $_SESSION['level'] = $user['level'];
        header('Location: ' . BASEURL . '/home');
        exit;
    }

    public function register()
    {
        $data['judul'] = 'Register';

        $this->view('templates/header', $data);
        $this->view('auth/register');
        $this->view('templates/footer');
    }

    public function registerStore()
    {
        if (
            empty($_POST['nim']) ||
            empty($_POST['nama']) ||
            empty($_POST['fakultas']) ||
            empty($_POST['angkatan']) ||
            empty($_POST['jk']) ||
            empty($_POST['umur']) ||
            empty($_POST['password'])
        ) {
            Flasher::setAlert('Pastikan seluruh data sudah terisi dengan benar!', 'danger');
            header('Location: ' . BASEURL . '/auth/register');
            exit;
        }

        if ($this->model('UserModel')->findUserByNIM($_POST['nim'])) {
            Flasher::setAlert('NIM sudah terdaftar!', 'danger');
            header('Location: ' . BASEURL . '/auth/register');
            exit;
        }

        // $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        if ($this->model('UserModel')->register($_POST) > 0) {
            Flasher::setAlert('Register Berhasil Silahkan Login', 'success');
            header('Location: ' . BASEURL . '/auth');
            exit;
        } else {
            Flasher::setAlert('Register Gagal', 'danger');
            header('Location: ' . BASEURL . '/auth/register');
            exit;
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . BASEURL . '/');
        exit;
    }
}
