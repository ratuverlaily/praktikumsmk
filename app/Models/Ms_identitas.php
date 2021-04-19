<?php

namespace App\Models;

use CodeIgniter\Model;

class Ms_identitas extends Model
{
    var $table = 'users';


    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('users');
    }

    public function get_data_user()
    {
        $id = user()->id;
        $query = $this->db->query('SELECT * FROM `users` a INNER JOIN userdetail b ON a.id=b.id_user WHERE a.id=' . $id);

        return $query->getRow();
    }

    public function get_data_kelas()
    {
        $id = user()->id;
        $query = $this->db->query('SELECT b.id_kelas as id_kelas, b.kode as kode, b.nama as nama, b.jurusan as jurusan, b.id_user as id_guru, c.fullname as guru FROM `userdetail` a INNER JOIN kelas b ON a.id_kelas = b.id_kelas INNER JOIN users as c ON b.id_user = c.id where a.id_user =' . $id);
        return $query->getRow();
    }

    public function get_login_user()
    {
        $id = user()->id;
        $query = $this->db->query('SELECT id, email, password_hash FROM users WHERE id=' . $id);
        return $query->getRow();
    }

    public function identitas_add($data)
    {
        $query = $this->db->table('userdetail')->insert($data);
    }

    public function identitas_image_update($where, $data)
    {
        $this->db->table($this->table)->update($data, $where);
    }

    public function identitas_user_update($where, $data)
    {
        $this->db->table('auth_groups_users')->update($data, $where);
    }
}
