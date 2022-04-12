<?php

class AdminModel {

    private $db;
    private $tbl_responden = 'tbl_responden';
    private $tbl_gejala = 'tbl_gejala';
    private $tbl_solusi = 'tbl_solusi';
    private $tbl_hasil = 'tbl_hasil';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllRiwayat()
    {
        $query = "SELECT * FROM ". $this->tbl_hasil;
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function detailRiwayat($nim, $record)
    {
        $query = "SELECT * FROM ". $this->tbl_hasil ." WHERE nim=:nim AND record=:record";
        $this->db->query($query);
        $this->db->bind('nim', $nim);
        $this->db->bind('record', $record);
        
        return $this->db->single();
    }

    public function getCFAndHResponden($nim, $record)
    {
        $query = "SELECT r_cf, H, ". $this->tbl_gejala .".gejala, ". $this->tbl_gejala .".tingkatan FROM `". $this->tbl_responden ."` JOIN `". $this->tbl_gejala ."` ON ". $this->tbl_responden .".id_gejala = ". $this->tbl_gejala .".id_gejala WHERE tbl_responden.nim=:nim AND tbl_responden.record=:record";

        $this->db->query($query);
        $this->db->bind('nim', $nim);
        $this->db->bind('record', $record);
        return $this->db->resultSet();
    }

    public function detailRiwayatPerhitungan($nim, $record)
    {
        $solusi = $this->getSolusi();
        $x = 1;
        foreach ($solusi as $key_solusi => $value_solusi) {

            $nilai_H = $this->getNilaiHByTingkatanAndRecord($value_solusi['id_solusi'], $nim, $record);
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

    protected function getNilaiHByTingkatanAndRecord($id_solusi_string, $nim, $record)
    {
        $id_solusi = intval( $id_solusi_string );
        $query = "SELECT H FROM `". $this->tbl_gejala ."` 
        JOIN `". $this->tbl_responden ."` ON ". $this->tbl_gejala .".id_gejala = ". $this->tbl_responden .".id_gejala WHERE ". $this->tbl_responden .".nim=:nim AND ". $this->tbl_responden .".record=:record AND tingkatan=:id_solusi";

        $this->db->query($query);
        $this->db->bind('nim', $nim);
        $this->db->bind('id_solusi', $id_solusi);
        $this->db->bind('record', $record);
        return $this->db->resultSet();
    }

    protected function getSolusi()
    {
        $this->db->query('SELECT * FROM '. $this->tbl_solusi);
        return $this->db->resultSet();
    }

    public function hapusHasilResponden($id)
    {
        $query = "DELETE FROM ". $this->tbl_hasil ." WHERE id_hasil=:id";
        
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        
        return $this->db->rowCount();
    }
}