<?php

namespace App\Models;

use CodeIgniter\Model;

class Ms_hasilpraktikum extends Model
{
    var $table = 'praktikum';

    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $builder = $db->table('praktikum');
    }

    public function get_all_hasilpraktikum($id)
    {
        $query = $this->db->query('SELECT * FROM `praktikum_dikelas` a INNER JOIN praktikum b ON a.id_praktikum=b.id_praktikum where a.id_kelas=' . $id);
        return $query->getResult();
    }

    public function get_posttest_byid($id, $id_user)
    {
        $sql = 'SELECT * FROM praktikum_posttest a INNER JOIN praktikum b ON a.id_praktikum = b. id_praktikum where a.id_user =' . $id_user . ' and a.id_praktikum =' . $id;
        $query =  $this->db->query($sql);

        return $query->getResult();
    }

    public function get_pretest_byid($id, $id_user)
    {
        $sql = 'SELECT b.judul as judul, a.tanggal as posting, a.tanggal_finish as selesai, b.tanggal_batas as batas, a.waktu as waktu,a.status as status FROM praktikum_pretest a INNER JOIN praktikum b ON a.id_praktikum = b. id_praktikum INNER JOIN userdetail c ON a.id_user = c.id_user where a.id_user =' . $id_user . ' and a.id_praktikum =' . $id;
        $query =  $this->db->query($sql);

        return $query->getRow();
    }
}
