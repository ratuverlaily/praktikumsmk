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
        if (empty($this->session->get('id_kelas'))) {
            $data['kelasaktif'] = 'BELUM TERDAFTAR';
            $data['status_kelas'] = 0;

            return view('t_siswa/kelas', $data);
        } else {
            $data['kelasaktif'] = $this->session->get('nama');
            $data['id_kelas'] = $this->session->get('id_kelas');
            $this->Ms_identitas = new Ms_identitas();
            $data['users'] = $this->Ms_identitas->get_data_user();
            $data['kelass'] = $this->Ms_identitas->get_data_kelas();
            $data['siswa'] = $this->Ms_identitas->get_login_user();
            return view('t_siswa/identitas', $data);
        }
    }

    public function registrasi()
    {
        helper(['form', 'url']);

        $validated = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[file,4096]',
            ],
            'fullname' => [
                'rules' => 'required',
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
            ],
            'no_telpon' => [
                'rules' => 'required',
            ],
            'alamat' => [
                'rules' => 'required',
            ],
            'akses' => [
                'rules' => 'required',
            ],
        ]);

        if ($validated) {

            $request = service('request');
            $this->Ms_identitas = new Ms_identitas();

            $file = $request->getFile('file');
            $nama = $file->getRandomName();

            $upUser['user_image'] = $nama;
            $upUser['fullname'] = $request->getPost('fullname');

            $id = user()->id;
            $this->Ms_identitas->identitas_image_update(array('id' => $id), $upUser);

            $file->move('uploads', $nama);

            $data['jenis_kelamin'] = $request->getPost('jenis_kelamin');
            $data['no_telpon'] = $request->getPost('no_telpon');
            $data['alamat'] = $request->getPost('alamat');
            $data['facebook'] = $request->getPost('facebook');
            $data['instagram'] = $request->getPost('instagram');
            $data['tweter'] = $request->getPost('tweter');
            $data['linkedIn'] = $request->getPost('linkedIn');
            $data['id_user'] = user()->id;
            $data['tanggal'] = date("Y-m-d h:i:sa");
            $this->Ms_identitas->identitas_add($data);

            $hakakses['group_id'] = $request->getPost('akses');
            $this->Ms_identitas->identitas_user_update(array('user_id' => $id), $hakakses);

            if (in_groups('siswa')) {
                return view("t_siswa/home");
            } else {
                $getdata['kelasaktif'] = "";
                $getdata['kelass'] = null;
                return view("t_guru/home", $getdata);
            }
        } else {
            $data['msg'] = "Maaf Data Tidak Dapat Di Proses Karena Belum Lengkap";
            return view("auth/identitas", $data);
        }
    }
}
