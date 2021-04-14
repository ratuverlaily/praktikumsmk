<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Ms_modul;

class S_modul extends BaseController
{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        helper(['form', 'url']);
        $this->Ms_modul = new Ms_modul();
        $data['moduls'] = $this->Ms_modul->get_all_modul();
        $data['kelasaktif'] = $this->session->get('nama');
        $data['id_kelas'] = $this->session->get('id_kelas');

        return view('t_siswa/modul', $data);
    }
}
