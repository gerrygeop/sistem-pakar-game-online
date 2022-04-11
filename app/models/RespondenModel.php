<?php

class RespondenModel {

    private $db;
    private $tbl_responden = 'tbl_responden';
    private $tbl_gejala = 'tbl_gejala';
    private $tbl_solusi = 'tbl_solusi';
    private $tbl_hasil = 'tbl_hasil';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->query('SELECT * FROM '. $this->tbl_responden);
        return $this->db->resultSet();
    }

    public function getGejala()
    {
        $this->db->query('SELECT * FROM '. $this->tbl_gejala);
        return $this->db->resultSet();
    }

    protected function getCF()
    {
        $this->db->query('SELECT CF FROM '. $this->tbl_gejala);
        return $this->db->resultSet();
    }

    protected function getMaxRecordResponden()
    {
        $query = "SELECT record FROM ". $this->tbl_responden ." WHERE record = (SELECT MAX(record) FROM $this->tbl_responden);";
        return $this->db->single();
    }

    public function tambahResponden($data)
    {
        $nim = intval( $_SESSION['nim'] );

        $is_nim_exists = $this->checkUserTableResponden();
        if ($is_nim_exists) {
            $record = $this->getMaxRecordResponden();
            $record = intval( $record );
            $record += 1;
        } else {
            $record = 1;
        }

        foreach ($data as $id => $rcf_string) {

            $r_cf = (float) $rcf_string;
            $CF_string = $this->getCFByID($id);
            $CF = (float) $CF_string['CF'];
            $nilai_H = $CF * $r_cf;

            $query = "INSERT INTO ". $this->tbl_responden ." (id_gejala, nim, r_cf, H, record) VALUES (:id_gejala, :nim, :r_cf, :H, :record)";
            $this->db->query($query);
        
            $this->db->bind('id_gejala', $id);
            $this->db->bind('nim', $nim);
            $this->db->bind('r_cf', $r_cf);
            $this->db->bind('H', $nilai_H);
            $this->db->bind('record', $record);
            $this->db->execute();
        }
        
        return $this->db->rowCount();
    }

    protected function getCFByID($id)
    {
        $this->db->query('SELECT CF FROM '. $this->tbl_gejala .' WHERE id_gejala=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    protected function getNilaiHByTingkatan($id_solusi_string)
    {
        $id_solusi = intval( $id_solusi_string );
        $query = "SELECT H FROM `". $this->tbl_gejala ."` 
        JOIN `". $this->tbl_responden ."` ON ". $this->tbl_gejala .".id_gejala = ". $this->tbl_responden .".id_gejala WHERE ". $this->tbl_responden .".nim=:nim AND tingkatan=:id_solusi AND ". $this->tbl_responden .".record = (SELECT MAX(record) FROM ". $this->tbl_responden .")";

        $this->db->query($query);
        $this->db->bind('nim', $_SESSION['nim']);
        $this->db->bind('id_solusi', $id_solusi);
        return $this->db->resultSet();
    }

    protected function getSolusi()
    {
        $this->db->query('SELECT * FROM '. $this->tbl_solusi);
        return $this->db->resultSet();
    }

    public function hasilCF()
    {
        $solusi = $this->getSolusi();
        foreach ($solusi as $key_solusi => $value_solusi) {

            $nilai_H = $this->getNilaiHByTingkatan($value_solusi['id_solusi']);
            foreach ($nilai_H as $key_H => $value) {
                if ($key_H === array_key_first($nilai_H)) {
                    $hcf = $value['H'];
    
                } else {
                    $hcf = $hcf + $value['H'] * (1 - $hcf);
                }
            }
            
            $hasilAkhirSolusi[$key_solusi] = $hcf;
            $hcf = null;
        }

        foreach ($hasilAkhirSolusi as $index => $nilaiAkhir) {
            if ($index === array_key_first($hasilAkhirSolusi)) {
                $tempHasilAkhir = $nilaiAkhir;
                
            } else {
                $tempHasilAkhir = $tempHasilAkhir + $nilaiAkhir;
            }

            $sumHasil = $tempHasilAkhir;
        }
        
        $bagiTiga = $sumHasil / count($hasilAkhirSolusi);
        unset($sumHasil);

        $bagiSeratus = $bagiTiga * 100;
        unset($bagiTiga);
        
        unset($hasilAkhirSolusi);
        return $bagiSeratus;
    }

    protected function getMaxRecordHasil()
    {
        $query = "SELECT record FROM ". $this->tbl_hasil ." WHERE record = (SELECT MAX(record) FROM $this->tbl_hasil);";
        return $this->db->single();
    }

    public function simpanHasil($nilaiH, $solusi)
    {
        $date = new DateTime();
        $date = $date->format('Y-m-d H:i:s');

        $is_nim_exists = $this->checkUserTableHasil();
        if ($is_nim_exists) {
            $record = $this->getMaxRecordHasil();
            $record = intval( $record );
            $record += 1;
        } else {
            $record = 1;
        }

        // $nilai_yang_sama = $this->cekNilaiAkhirJikaAdaYangSama($nilaiH);
        // if ($nilai_yang_sama) return;

        $id_solusi = $this->dapatkanLevelGejala($nilaiH, $solusi);

        $nim = intval( $_SESSION['nim'] );

        $query = "INSERT INTO ". $this->tbl_hasil ." (nim, nilai_akhir, id_solusi, record) VALUES (:nim, :nilai_akhir, :id_solusi, :record)";
        $this->db->query($query);
    
        $this->db->bind('nim', $nim);
        $this->db->bind('nilai_akhir', $nilaiH);
        $this->db->bind('id_solusi', $id_solusi);
        $this->db->bind('record', $record);
        $this->db->execute();

        return $this->db->rowCount();
    }

    protected function cekNilaiAkhirJikaAdaYangSama($nilai_akhir)
    {
        $this->db->query('SELECT nilai_akhir FROM '. $this->tbl_hasil .' WHERE nilai_akhir=:nilai_akhir');
        $this->db->bind('nilai_akhir', $nilai_akhir);
        return $this->db->single();
    }

    protected function dapatkanLevelGejala($nilaiH, $solusi)
    {
        if ( $nilaiH <= 33.9 ) {
            return $solusi[0]['id_solusi'];

        } elseif ( $nilaiH >= 34 && $nilaiH <= 67.9) {
            return $solusi[1]['id_solusi'];

        } else {
            return $solusi[2]['id_solusi'];
        }
    }

    protected function checkUserTableResponden()
    {
        $this->db->query('SELECT * FROM '. $this->tbl_responden .' WHERE nim=:nim');
        $this->db->bind('nim', $_SESSION['nim']);
        return $this->db->single();
    }

    protected function checkUserTableHasil()
    {
        $this->db->query('SELECT * FROM '. $this->tbl_hasil .' WHERE nim=:nim');
        $this->db->bind('nim', $_SESSION['nim']);
        return $this->db->single();
    }

    public function hapusSolusi($id)
    {
        $query = "DELETE FROM ". $this->tbl_responden ." WHERE id_solusi=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateSolusi($data)
    {
        $query = "UPDATE ". $this->tbl_responden ." SET level_gejala=:level_gejala, solusi=:solusi WHERE id_solusi=:id_solusi";

        $this->db->query($query);
        $this->db->bind('id_solusi', $data['id_solusi']);
        $this->db->bind('level_gejala', $data['level_gejala']);
        $this->db->bind('solusi', $data['solusi']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getRiwayat()
    {
        $nim = intval( $_SESSION['nim'] );

        $query = "SELECT * FROM ". $this->tbl_hasil ." WHERE nim=:nim";
        $this->db->query($query);
        $this->db->bind('nim', $nim);
        
        return $this->db->resultSet();
    }

    public function detailRiwayat($record)
    {
        $query = "SELECT * FROM ". $this->tbl_hasil ." WHERE record=:record";
        $this->db->query($query);
        $this->db->bind('record', $record);
        
        return $this->db->single();
    }

    public function detailRiwayatPerhitungan($record)
    {
        $solusi = $this->getSolusi();
        $x = 1;
        foreach ($solusi as $key_solusi => $value_solusi) {

            $nilai_H = $this->getNilaiHByTingkatanAndRecord($value_solusi['id_solusi'], $record);
            foreach ($nilai_H as $key_H => $value) {
                if ($key_H === array_key_first($nilai_H)) {
                    $hcf = $value['H'];

                } else {
                    $hcf = $hcf + $value['H'] * (1 - $hcf);
                    $combin[$x][] = $hcf;
                }
            }
            
            $hasilAkhirSolusi[$key_solusi] = $hcf;
            unset($hcf);
            $x += 1;
        }

        foreach ($hasilAkhirSolusi as $index => $nilaiAkhir) {
            if ($index === array_key_first($hasilAkhirSolusi)) {
                $tempHasilAkhir = $nilaiAkhir;
                
            } else {
                $tempHasilAkhir = $tempHasilAkhir + $nilaiAkhir;
            }

            $sumHasil = $tempHasilAkhir;
        }
        
        $bagiTiga = $sumHasil / count($hasilAkhirSolusi);
        unset($sumHasil);

        $bagiSeratus = $bagiTiga * 100;

        unset($bagiTiga);
        unset($hasilAkhirSolusi);


        $hasil['combin'] = $combin;
        $hasil['hasilBagiSeratus'] = $bagiSeratus;
        return $hasil;
    }

    protected function getNilaiHByTingkatanAndRecord($id_solusi_string, $record)
    {
        $id_solusi = intval( $id_solusi_string );
        $query = "SELECT H FROM `". $this->tbl_gejala ."` 
        JOIN `". $this->tbl_responden ."` ON ". $this->tbl_gejala .".id_gejala = ". $this->tbl_responden .".id_gejala WHERE ". $this->tbl_responden .".nim=:nim AND ". $this->tbl_responden .".record=:record AND tingkatan=:id_solusi";

        $this->db->query($query);
        $this->db->bind('nim', $_SESSION['nim']);
        $this->db->bind('id_solusi', $id_solusi);
        $this->db->bind('record', $record);
        return $this->db->resultSet();
    }

    public function getCFAndHResponden($record)
    {
        $query = "SELECT r_cf, H, ". $this->tbl_gejala .".gejala, ". $this->tbl_gejala .".tingkatan FROM `". $this->tbl_responden ."` JOIN `". $this->tbl_gejala ."` ON ". $this->tbl_responden .".id_gejala = ". $this->tbl_gejala .".id_gejala WHERE tbl_responden.nim=:nim AND tbl_responden.record=:record";

        $this->db->query($query);
        $this->db->bind('nim', $_SESSION['nim']);
        $this->db->bind('record', $record);
        return $this->db->resultSet();
    }
}