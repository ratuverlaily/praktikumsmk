<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Ms_praktikum;

class S_modul extends BaseController
{
    public function index()
    {
        return view('t_siswa/modul');
    }
}
