<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Ms_siswa;
use App\Models\Ms_kelas;
use App\Models\Mg_sekolah;

class S_siswa extends BaseController
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
        $id_user = user()->id;

        if (empty($this->session->get('id_kelas'))) {
            $data['kelasaktif'] = 'BELUM TERDAFTAR';
            $data['status_kelas'] = 0;
        } else {
            $this->Ms_siswa = new Ms_siswa();
            $data = [
                'tampildata' => $this->Ms_siswa->get_all_siswa($this->session->get('id_kelas'))
            ];

            $data['status_kelas'] = 1;
            $data['kelasaktif'] = $this->session->get('nama');
            $data['id_kelas'] = $this->session->get('id_kelas');

            $this->Mg_sekolah = new Mg_sekolah();
            $skl = $this->Mg_sekolah->get_all_sekolah($this->session->get('id_guru'));
            $data['sekolah'] = $skl->nama;
        }

        return view('t_siswa/siswa', $data);
    }
}
