<?php

namespace App\Models;

use CodeIgniter\Model;

class Mg_praktikum_kelas extends Model
{
    var $table = 'praktikum_dikelas';

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('praktikum_dikelas');
    }
    public function praktikum_kelas_add($data)
    {
        $query = $this->db->table($this->table)->insert($data);
    }
}
