<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Ms_identitas;

class S_identitas extends BaseController
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
        return view('t_siswa/identitas');
    }

    public function ambildata()
    {
        $request = service('request');

        if ($request->isAJAX()) {
            $identitas = new Ms_identitas();

            $data = array(
                'id_modul' => 'aku',
                'nama' => $request->getPost('nama'),
                'jurusan' => $request->getPost('jurusan'),
                'jumlah' => $request->getPost('jumlah'),
            );
            /*$data = [
                'tampildata' => "hallll0",
            ];

            /*$msg = [
                'data' => view('t_siswa/identitasdata', $data)
            ];*/

            echo json_encode($data);
        } else {
            exit('Maaf Tidak Dapat Di Proses');
        }
    }
}
