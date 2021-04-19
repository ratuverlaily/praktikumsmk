<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Mgs_posting;

class Gs_posting extends BaseController
{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        if (in_groups('siswa')) {
        } else {
        }

        if (empty($this->session->get('id_kelas'))) {
            $data['kelasaktif'] = 'BELUM TERDAFTAR';
            $data['status_kelas'] = 0;

            return view('t_siswa/kelas', $data);
        } else {
            $data['kelasaktif'] = $this->session->get('nama');
            $data['id_kelas'] = $this->session->get('id_kelas');
            return view('t_siswa/home', $data);
        }
    }

    public function add_posting()
    {
        helper(['form', 'url']);

        $validated = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,application/pdf,application/zip,application/msword,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[file,4096]',
            ],
        ]);
        $request = service('request');

        if ($validated) {


            $file = $request->getFile('file');
            $komentar = $request->getPost('komentar');

            if (empty($file)) {
                echo 1;
            } else {
                echo 2;
            }


            $nama = $file->getRandomName();
            //$file->move('uploads', $nama);
            echo $nama;
        } else {
            $data['tanggal'] = date("Y-m-d h:i:sa");
            $data['posting'] = $request->getPost('komentar');
            $data['id_user'] = user()->id;
            $data['id_kelas'] = $this->session->get('id_kelas');
        }
    }
}
