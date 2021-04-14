<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Mg_siswa;
use App\Models\Mg_kelas;

class G_siswa extends BaseController
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
        $this->Mg_siswa = new Mg_siswa();
        $id_kelas = $this->session->get('id_kelas');

        $data = [
            'tampildata' => $this->Mg_siswa->get_all_siswa($id_kelas)
        ];
        $data['kelasaktif'] = $this->session->get('nama');
        $data['id_kelas'] = $this->session->get('id_kelas');
        $this->Mg_kelas = new Mg_kelas();
        $data['kelass'] = $this->Mg_kelas->get_all_kelas();

        return view('t_guru/siswa', $data);
    }
}
