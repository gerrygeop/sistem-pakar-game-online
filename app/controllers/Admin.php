<?php

class Admin extends Controller {

    public function laporanDataUser()
    {
        $data['judul'] = 'Laporan Data User';
        $data['laporan'] = $this->model('AdminModel')->getAllRiwayat();
        $data['solusi'] = $this->model('DataPenyakitModel')->getAll();

        $this->view('templates/header', $data);
        $this->view('admin/laporan', $data);
        $this->view('templates/footer');
    }

    public function detail($nim, $record)
    {
        $data['judul'] = 'Laporan Data User';
        $data['laporan'] = $this->model('AdminModel')->detailRiwayat($nim, $record);
        $data['riwayatResponden'] = $this->model('AdminModel')->getCFAndHResponden($nim, $record);
        $data['nilaiH'] = $this->model('AdminModel')->detailRiwayatPerhitungan($nim, $record);
        $data['solusi'] = $this->model('DataPenyakitModel')->getAll();
        $data['mhs'] = $this->model('UserModel')->getUserByNIM($data['laporan']['nim']);

        $this->view('templates/header', $data);
        $this->view('admin/detail-laporan', $data);
        $this->view('templates/footer');
    }

    public function delete($id)
    {
        if ($this->model('AdminModel')->hapusHasilResponden($id) > 0) {
            Flasher::setFlash('Berhasil', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/admin/index');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Dihapus', 'danger');
            header('Location: ' . BASEURL . '/admin/index');
            exit;
        }
    }

}