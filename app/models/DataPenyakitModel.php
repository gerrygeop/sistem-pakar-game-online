<?php

class DataPenyakitModel {

    private $tbl = 'tbl_solusi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->query('SELECT * FROM '. $this->tbl);
        return $this->db->resultSet();
    }

    public function storeData($data)
    {
       $query = "INSERT INTO ". $this->tbl ." (level_gejala, solusi) VALUES (:level_gejala, :solusi)";

        $this->db->query($query);

        $this->db->bind('level_gejala', $data['level_gejala']);
        $this->db->bind('solusi', $data['solusi']);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function hapusSolusi($id)
    {
        $query = "DELETE FROM ". $this->tbl ." WHERE id_solusi=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function getID($id)
    {
        $this->db->query('SELECT * FROM '. $this->tbl .' WHERE id_solusi=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function updateSolusi($data, $id)
    {
        $query = "UPDATE ". $this->tbl ." SET level_gejala=:level_gejala, solusi=:solusi WHERE id_solusi=:id_solusi";

        $this->db->query($query);
        $this->db->bind('id_solusi', $id);
        $this->db->bind('level_gejala', $data['level_gejala']);
        $this->db->bind('solusi', $data['solusi']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}