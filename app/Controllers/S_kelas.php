<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Ms_kelas;
use App\Models\Mg_kelas;

class S_kelas extends BaseController
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

        $this->Ms_kelas = new Ms_kelas();
        $data['kelass'] = $this->Ms_kelas->get_kelas_by_user($id_user);
        $data['kelasaktif'] = $this->session->get('nama');
        $data['id_kelas'] = $this->session->get('id_kelas');
        $id_guru = $this->session->get('id_guru');

        /*$guru = $this->Ms_kelas->get_pengajar($id_guru);
        $data['nama_guru'] =  $guru->fullname;

        $kls = $this->Ms_kelas->get_status_kelas();
        $data['status_kelas'] =  $kls->id_kelas;*/

        dd($data);

        //return view('t_siswa/kelas', $data);
    }

    public function kelas_add()
    {
        $request = service('request');
        helper(['form', 'url']);
        $this->Mg_kelas = new Mg_kelas();
        $kode = $request->getPost('kode_kelas');
        $data = $this->Mg_kelas->search_kodekelas_by_id($kode);

        if (!empty($data->id_kelas)) {
            $this->Ms_kelas = new Ms_kelas();
            $data = array(
                'id_kelas' => $data->id_kelas,
            );
            $data = $this->Ms_kelas->user_update(array('id_user' => user()->id), $data);
        }
        echo json_encode(array("status" => TRUE));
    }
}
