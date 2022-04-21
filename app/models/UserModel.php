<?php

class UserModel {

    private $table = 'tbl_user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data)
    {
        $query = "INSERT INTO ". $this->table ." (nim, nama, fakultas, angkatan, jk, umur, password, level) VALUES (:nim, :nama, :fakultas, :angkatan, :jk, :umur, :password, :level)";

        $this->db->query($query);

        $this->db->bind('nim', $data['nim']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('fakultas', $data['fakultas']);
        $this->db->bind('angkatan', $data['angkatan']);
        $this->db->bind('jk', $data['jk']);
        $this->db->bind('umur', $data['umur']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('level', 'mahasiswa');

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function loginUser($nim, $password)
    {
        $this->db->query('SELECT * FROM '. $this->table .' WHERE level=:level AND nim=:nim');
        $this->db->bind('level', 'mahasiswa');
        $this->db->bind('nim', $nim);

        $row = $this->db->single();
        
        if ($row == NULL) {
            return 0;
        }

        if ($password == $row['password']) {
            return $row;
        } else {
            return false;
        }
    }

    public function loginAdmin($nim, $password)
    {
        $this->db->query('SELECT * FROM '. $this->table .' WHERE level=:level AND nim=:nim');
        $this->db->bind('level', 'admin');
        $this->db->bind('nim', $nim);

        $row = $this->db->single();
        $hashPassword = $row['password'];

        // if (password_verify($password, $hashPassword)) {
        if ($password == $hashPassword) {
            return $row;
        } else {
            return false;
        }
    }

    public function findUserByNIM($nim)
    {
        $this->db->query('SELECT * FROM '. $this->table .' WHERE nim=:nim');
        $this->db->bind('nim', $nim);

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserByNIM($nim)
    {
        $this->db->query('SELECT * FROM '. $this->table .' WHERE nim=:nim');
        $this->db->bind('nim', $nim);
        return $this->db->single();
    }

    public function updateProfileUser($data)
    {
        $query = "UPDATE ". $this->table ." SET nim=:nim, nama=:nama, fakultas=:fakultas, angkatan=:angkatan,jk=:jk, umur=:umur WHERE nim=:nim";

        $this->db->query($query);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('fakultas', $data['fakultas']);
        $this->db->bind('angkatan', $data['angkatan']);
        $this->db->bind('jk', $data['jk']);
        $this->db->bind('umur', $data['umur']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updatePasswordUser($password, $nim)
    {
        $query = "UPDATE ". $this->table ." SET password=:password WHERE nim=:nim";

        $this->db->query($query);
        $this->db->bind('nim', $nim);
        $this->db->bind('password', $password);

        $this->db->execute();
        return $this->db->rowCount();
    }

}