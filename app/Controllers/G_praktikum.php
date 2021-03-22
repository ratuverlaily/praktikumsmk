<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Mg_praktikum;

class G_praktikum extends BaseController
{
    public function index()
    {

        helper(['form', 'url']);
        $this->Mg_praktikum = new Mg_praktikum();
        $data['praktikums'] = $this->Mg_praktikum->get_all_praktikum();
        return view('t_guru/praktikum', $data);
    }

    public function praktikum_add()
    {
        $request = service('request');
        $file = $request->getFile('photofile');
        echo "File Name :" . $file;
        die;
        if ($file->getSize() > 0) {
            echo "File Name :" . $file->getName();
            echo "<br/>File Random Name :" . $file->getRandomName();
            echo "<br/>File Size :" . $file->getSize();
            echo "<br/>File Extension :" . $file->getExtension();

            $file->move('./public/upload', $file->getRandomName());
        }

        /*$request = service('request');
        helper(['form', 'url']);
        $this->Mg_praktikum = new Mg_praktikum();

        $data = array(
            'id_praktikum' => $request->getPost('id_praktikum'),
            'nama' => $request->getPost('nama'),
            'jurusan' => $request->getPost('jurusan'),
            'jumlah' => $request->getPost('jumlah'),
        );
        $insert = $this->Mg_praktikum->praktikum_add($data);
        echo json_encode(array("status" => TRUE));*/
    }

    public function ajax_edit($id)
    {

        $this->praktikum_model = new Mg_praktikum();

        $data = $this->praktikum_model->get_by_id($id);

        echo json_encode($data);
    }

    public function praktikum_update()
    {
        $request = service('request');
        helper(['form', 'url']);
        $this->praktikum_model = new Mg_praktikum();

        $data = array(
            'id_praktikum' => $request->getPost('id_praktikum'),
            'nama' => $request->getPost('nama'),
            'jurusan' => $request->getPost('jurusan'),
            'jumlah' => $request->getPost('jumlah'),
        );
        $this->praktikum_model->praktikum_update(array('id_praktikum' => $request->getPost('id_praktikum')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function praktikum_delete($id)
    {

        helper(['form', 'url']);
        $this->praktikum_model = new Mg_praktikum();
        $this->praktikum_model->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
}
