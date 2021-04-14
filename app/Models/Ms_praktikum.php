<?php

namespace App\Models;

use CodeIgniter\Model;

class Ms_praktikum extends Model
{
    var $table = 'praktikum';
    var $tableprakstatus = 'statuspraktikum';

    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $builder = $db->table('praktikum');
    }

    public function get_all_praktikum($id)
    {
        $sql = 'SELECT * FROM `praktikum_dikelas` as a INNER JOIN praktikum as b ON a.id_praktikum = b.id_praktikum where a.id_kelas =' . $id;
        $query =  $this->db->query($sql);
        return $query->getResult();
    }

    public function get_by_id($id_praktikum, $id_kelas)
    {
        $sql = 'select * FROM `praktikum` as a LEFT JOIN praktikum_dikelas as b ON a.id_praktikum = b.id_praktikum where a.id_praktikum =' . $id_praktikum . ' and b.id_kelas=' . $id_kelas;
        $query =  $this->db->query($sql);

        return $query->getRow();
    }
}
