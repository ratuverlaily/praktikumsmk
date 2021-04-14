<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Ms_praktikum;
use App\Models\Ms_statuspraktikum;

class S_praktikum extends BaseController
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
        $this->Ms_praktikum = new Ms_praktikum();
        $data['kelasaktif'] = $this->session->get('nama');
        $data['id_kelas'] = $this->session->get('id_kelas');
        $data['praktikums'] = $this->Ms_praktikum->get_all_praktikum($this->session->get('id_kelas'));

        return view('t_siswa/praktikum', $data);
    }

    public function lihatdetail($id = null)
    {
        $this->Ms_praktikum = new Ms_praktikum();
        $id_kelas = $this->session->get('id_kelas');
        $data = $this->Ms_praktikum->get_by_id($id, $id_kelas);
        $hasil['tampildata'] = $data;
        $hasil['kelasaktif'] = $this->session->get('nama');
        return view('t_siswa/praktikum_detail', $hasil);
    }

    public function mulaipraktikum($id = null)
    {
        $sessionIduser = user()->id;
        $idpraktikum = $id;
        $status = 'on';

        $data = array(
            'id_stpraktikum ' => '',
            'id_user' => $sessionIduser,
            'id_praktikum' => $idpraktikum,
            'status' => $status,
        );

        $this->Ms_statuspraktikum = new Ms_statuspraktikum();
        //'id_modul' => $request->getPost('id_modul'))
        $this->Ms_statuspraktikum->statuspraktikumadd(array($data));
    }
}
