<?php

namespace App\Models;

use CodeIgniter\Model;

class Mg_identitas extends Model
{
    function __construct()
    {
        $this->db = db_connect();
    }

    function tampildata()
    {
        //query builder
        return $this->db->table('userdetail')->get();
    }

    function listdetail($idp)
    {
        $query = $this->db->table('praktikum');
        $getquery = $query->getWhere(['id_praktikum' => $idp]);
        return $getquery;
    }
}
