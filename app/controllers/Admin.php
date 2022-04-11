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

    public function detailLaporanDataUser($nim, $record)
    {
        $data['judul'] = 'Laporan Data User';
        $data['laporan'] = $this->model('AdminModel')->detailRiwayat($nim, $record);
        $data['nilaiH'] = $this->model('AdminModel')->detailRiwayatPerhitungan($nim, $record);
        $data['solusi'] = $this->model('DataPenyakitModel')->getAll();
        $data['mhs'] = $this->model('UserModel')->getUserByNIM($data['laporan']['nim']);

        $this->view('templates/header', $data);
        $this->view('admin/detail-laporan', $data);
        $this->view('templates/footer');
    }

}