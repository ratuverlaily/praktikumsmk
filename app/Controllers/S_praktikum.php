<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Ms_praktikum;

class S_praktikum extends BaseController
{
    public function index()
    {

        helper(['form', 'url']);
        $this->Ms_praktikum = new Ms_praktikum();
        $data['praktikums'] = $this->Ms_praktikum->get_all_praktikum();
        return view('t_siswa/praktikum', $data);
    }
}
