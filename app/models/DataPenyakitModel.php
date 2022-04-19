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

    public function getID($id)
    {
        $this->db->query('SELECT * FROM '. $this->tbl .' WHERE id_solusi=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function storeData($data)
    {
        $min = $data['min'] == null ? null : $data['min'];
        $max = $data['max'] == null ? null : $data['max'];

       $query = "INSERT INTO ". $this->tbl ." (level_gejala, solusi, min, max, color) VALUES (:level_gejala, :solusi, :min, :max, :color)";

        $this->db->query($query);

        $this->db->bind('level_gejala', $data['level_gejala']);
        $this->db->bind('solusi', $data['solusi']);
        $this->db->bind('min', $min);
        $this->db->bind('max', $max);
        $this->db->bind('color', $color);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateSolusi($data, $id)
    {
        $min = $data['min'] == null ? null : $data['min'];
        $max = $data['max'] == null ? null : $data['max'];

        $query = "UPDATE ". $this->tbl ." SET level_gejala=:level_gejala, solusi=:solusi, min=:min, max=:max, color=:color WHERE id_solusi=:id_solusi";

        $this->db->query($query);
        $this->db->bind('id_solusi', $id);
        $this->db->bind('level_gejala', $data['level_gejala']);
        $this->db->bind('solusi', $data['solusi']);
        $this->db->bind('min', $min);
        $this->db->bind('max', $max);
        $this->db->bind('color', $data['color']);

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
}