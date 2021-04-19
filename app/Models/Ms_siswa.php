<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class Ms_siswa extends Model
{
    var $table = 'userdetail';

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('userdetail');
    }

    public function get_kelas_by_user()
    {
        $id = user()->id;
        $sql = 'SELECT b.id_kelas as id_kelas, b.kode as kode, b.nama as nama, b.jurusan as jurusan, b.jumlah as jumlah, b.id_user as id_guru FROM userdetail a INNER JOIN kelas b ON a.id_kelas = b.id_kelas WHERE a.id_user  = ' . $id;
        $query =  $this->db->query($sql);

        return $query->getRow();
    }

    public function user_update($where, $data)
    {
        $this->db->table($this->table)->update($data, $where);
        //return $this->db->affectedRows();
    }

    public function get_all_siswa($id_kelas)
    {
        $query = $this->db->query('select * from userdetail a INNER JOIN users b ON a.id_user = b.id where id_kelas =' . $id_kelas);

        return $query->getResult();
    }
}
