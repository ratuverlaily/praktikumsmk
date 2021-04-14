<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Mg_kelas;
use CodeIgniter\HTTP\IncomingRequest;

class G_kelas extends BaseController
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
        $this->Mg_kelas = new Mg_kelas();
        $data['kelass'] = $this->Mg_kelas->get_all_kelas();
        $data['kelasaktif'] = $this->session->get('nama');
        $data['id_kelas'] = $this->session->get('id_kelas');
        //dd($data);
        return view('t_guru/kelas', $data);
    }

    public function kelas_add()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 4; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $request = service('request');
        helper(['form', 'url']);
        $this->Mg_kelas = new Mg_kelas();
        $id = user()->id;

        $data = array(
            'id_kelas' => $request->getPost('id_kelas'),
            'kode' => $randomString,
            'nama' => $request->getPost('nama'),
            'jurusan' => $request->getPost('jurusan'),
            'id_user' => $id,
            'jumlah' => $request->getPost('jumlah'),

        );
        $insert = $this->Mg_kelas->kelas_add($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit($id)
    {

        $this->Mg_kelas = new Mg_kelas();

        $data = $this->Mg_kelas->get_by_id($id);

        echo json_encode($data);
    }

    public function aktifasi_edit($id)
    {
        $this->Mg_kelas = new Mg_kelas();

        $data = $this->Mg_kelas->get_by_id($id);

        $dt = json_encode($data);
        $hsl = json_decode($dt, true);

        if ($hsl['status_aktif'] == 1) {
            $data = $this->Mg_kelas->kelas_update(array('id_kelas' => $id), array('status_aktif' => 0));
        } else {
            $data = $this->Mg_kelas->updateStatus(array('id_kelas' => $id));
        }
        $this->session->set($hsl);
        echo json_encode($data);
    }

    public function kelas_update()
    {
        $request = service('request');
        helper(['form', 'url']);
        $this->Mg_kelas = new Mg_kelas();

        $data = array(
            'id_kelas' => $request->getPost('id_kelas'),
            'nama' => $request->getPost('nama'),
            'jurusan' => $request->getPost('jurusan'),
            'jumlah' => $request->getPost('jumlah'),
        );
        $this->Mg_kelas->kelas_update(array('id_kelas' => $request->getPost('id_kelas')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function kelas_delete($id)
    {

        helper(['form', 'url']);
        $this->Mg_kelas = new Mg_kelas();
        $this->Mg_kelas->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
}
