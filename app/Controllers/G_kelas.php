<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Mg_kelas;
use CodeIgniter\HTTP\IncomingRequest;

class G_kelas extends BaseController
{

    public function index()
    {

        helper(['form', 'url']);
        $this->Mg_kelas = new Mg_kelas();
        $data['kelass'] = $this->Mg_kelas->get_all_kelas();
        return view('t_guru/kelas', $data);
    }

    public function kelas_add()
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
        $insert = $this->Mg_kelas->kelas_add($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit($id)
    {

        $this->kelas_model = new Mg_kelas();

        $data = $this->kelas_model->get_by_id($id);

        echo json_encode($data);
    }

    public function kelas_update()
    {
        $request = service('request');
        helper(['form', 'url']);
        $this->kelas_model = new Mg_kelas();

        $data = array(
            'id_kelas' => $request->getPost('id_kelas'),
            'nama' => $request->getPost('nama'),
            'jurusan' => $request->getPost('jurusan'),
            'jumlah' => $request->getPost('jumlah'),
        );
        $this->kelas_model->kelas_update(array('id_kelas' => $request->getPost('id_kelas')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function kelas_delete($id)
    {

        helper(['form', 'url']);
        $this->kelas_model = new Mg_kelas();
        $this->kelas_model->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
}
