<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Ms_hasilpraktikum;

class S_hasilpraktikum extends BaseController
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

        if (empty($this->session->get('id_kelas'))) {
            $data['kelasaktif'] = 'BELUM TERDAFTAR';
            $data['status_kelas'] = 0;

            return view('t_siswa/kelas', $data);
        } else {
            $this->Ms_hasilpraktikum = new Ms_hasilpraktikum();
            $data['kelasaktif'] = $this->session->get('nama');
            $data['id_kelas'] = $this->session->get('id_kelas');
            $data['praktikums'] = $this->Ms_hasilpraktikum->get_all_hasilpraktikum($this->session->get('id_kelas'));

            return view('t_siswa/hasilpraktikum', $data);
        }
    }

    public function posttest($id)
    {
        $id_user = user()->id;

        $this->Ms_hasilpraktikum = new Ms_hasilpraktikum();

        $data = $this->Ms_hasilpraktikum->get_posttest_byid($id, $id_user);

        echo json_encode($data);
    }

    public function pretest($id)
    {
        $id_user = user()->id;

        $this->Ms_hasilpraktikum = new Ms_hasilpraktikum();

        $data = $this->Ms_hasilpraktikum->get_pretest_byid($id, $id_user);

        echo json_encode($data);
    }

    public function lihatdetail($id)
    {
        helper(['form', 'url']);
        $this->Ms_hasilpraktikum = new Ms_hasilpraktikum();
        $data = $this->Ms_hasilpraktikum->lihat_by_id($id);
        $hasil['tampildata'] = $data;

        $getnama = array('nama' => 'Ratu');

        return view('t_siswa/hasilpraktikum_detail', $hasil, $getnama);
    }
}
