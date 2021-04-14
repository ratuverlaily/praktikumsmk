<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class Mg_siswa extends Model
{
    var $table = 'userdetail';

    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $builder = $db->table('userdetail');
    }

    public function get_all_siswa($id)
    {
        $query = $this->db->query('select * from userdetail a INNER JOIN users b ON a.id_user = b.id where id_kelas =' . $id);

        return $query->getResult();
    }
}
