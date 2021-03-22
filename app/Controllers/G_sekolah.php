<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Mg_sekolah;

class G_sekolah extends BaseController
{
    public function index()
    {
        helper(['form', 'url']);
        $this->Mg_sekolah = new Mg_sekolah();
        $data = [
            'tampildata' => $this->Mg_sekolah->get_all_sekolah()
        ];
        return view('t_guru/sekolah', $data);
    }

    public function sekolah_add()
    {
        $request = service('request');
        helper(['form', 'url']);
        $this->Mg_sekolah = new Mg_sekolah();

        $data = array(
            'id_sekolah' => $request->getPost('id_sekolah'),
            'nama' => $request->getPost('nama'),
            'alamat' => $request->getPost('alamat'),
            'no_tlp' => $request->getPost('no_tlp'),
            'no_fax' => $request->getPost('no_fax'),
            'kode_pos' => $request->getPost('kode_pos'),
        );
        $insert = $this->Mg_sekolah->sekolah_add($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit($id)
    {

        $this->Mg_sekolah = new Mg_sekolah();

        $data = $this->Mg_sekolah->get_by_id($id);

        echo json_encode($data);
    }

    public function sekolah_update()
    {
        $request = service('request');
        helper(['form', 'url']);
        $this->sekolah_model = new Mg_sekolah();

        $data = array(
            'id_sekolah' => $request->getPost('id_sekolah'),
            'nama' => $request->getPost('nama'),
            'alamat' => $request->getPost('alamat'),
            'no_tlp' => $request->getPost('no_tlp'),
            'no_fax' => $request->getPost('no_fax'),
            'kode_pos' => $request->getPost('kode_pos'),
        );
        $this->sekolah_model->sekolah_update(array('id_sekolah' => $request->getPost('id_sekolah')), $data);
        echo json_encode(array("status" => TRUE));
    }
}
