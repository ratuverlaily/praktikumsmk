<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class Ms_kelas extends Model
{
    var $table = 'userdetail';

    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $builder = $db->table('userdetail');
    }

    public function get_status_kelas()
    {
        $id = user()->id;
        $sql = 'SELECT * FROM userdetail  WHERE id_user  = ' . $id;
        $query =  $this->db->query($sql);

        return $query->getRow();
    }

    public function get_kelas_by_user($id)
    {
        $id = user()->id;
        $sql = 'SELECT b.id_kelas as id_kelas, b.kode as kode, b.nama as nama, b.jurusan as jurusan, b.jumlah as jumlah, b.id_user as id_guru FROM userdetail a INNER JOIN kelas b ON a.id_kelas = b.id_kelas WHERE a.id  = ' . $id;
        $query =  $this->db->query($sql);

        return $query->getRow();
    }

    public function get_pengajar($id_pengajar)
    {
        $sql = 'SELECT * FROM users WHERE id  = ' . $id_pengajar;
        $query =  $this->db->query($sql);

        return $query->getRow();
    }

    public function user_update($where, $data)
    {
        $this->db->table($this->table)->update($data, $where);
    }
}
