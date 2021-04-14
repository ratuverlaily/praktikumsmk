<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Ms_praktikum;

class S_home extends BaseController
{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        $data['kelasaktif'] = $this->session->get('nama');
        $data['id_kelas'] = $this->session->get('id_kelas');
        return view('t_siswa/home');
    }
}
