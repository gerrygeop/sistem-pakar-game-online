<?php

class GejalaModel {

    private $tbl = 'tbl_gejala';
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
        $CF = $data['MB'] - $data['MD'];

        $query = "INSERT INTO ". $this->tbl ." (id_gejala, gejala, tingkatan, MB, MD, CF) VALUES (:id_gejala, :gejala, :tingkatan, :MB, :MD, :CF)";

        $this->db->query($query);

        $this->db->bind('id_gejala', $data['id_gejala']);
        $this->db->bind('gejala', $data['gejala']);
        $this->db->bind('tingkatan', $data['tingkatan']);
        $this->db->bind('MB', $data['MB']);
        $this->db->bind('MD', $data['MD']);
        $this->db->bind('CF', $CF);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusGejala($id)
    {
        $query = "DELETE FROM ". $this->tbl ." WHERE id_gejala=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getID($id)
    {
        $this->db->query('SELECT * FROM '. $this->tbl .' WHERE id_gejala=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function updateGejala($data)
    {
        $CF = $data['MB'] - $data['MD'];
        $query = "UPDATE ". $this->tbl ." SET id_gejala=:id_gejala, gejala=:gejala, tingkatan=:tingkatan, MB=:MB, MD=:MD, CF=:CF WHERE id_gejala=:id_gejala";

        $this->db->query($query);
        $this->db->bind('id_gejala', $data['id_gejala']);
        $this->db->bind('gejala', $data['gejala']);
        $this->db->bind('tingkatan', $data['tingkatan']);
        $this->db->bind('MB', $data['MB']);
        $this->db->bind('MD', $data['MD']);
        $this->db->bind('CF', $CF);


        $this->db->execute();
        return $this->db->rowCount();
    }



}