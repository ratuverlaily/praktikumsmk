<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Mg_modul;
use App\Models\Mg_kelas;

class G_modul extends BaseController
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
        $this->Mg_modul = new Mg_modul();
        $data['moduls'] = $this->Mg_modul->get_all_modul();
        $data['kelasaktif'] = $this->session->get('nama');
        $this->Mg_kelas = new Mg_kelas();
        $data['kelass'] = $this->Mg_kelas->get_all_kelas();
        $data['id_kelas'] = $this->session->get('id_kelas');
        return view('t_guru/modul', $data);
    }

    public function modul_add()
    {
        /*$request = service('request');
        $file = $request->getFile('photofile');
        echo "File Name :" . $file;
        die;
        if ($file->getSize() > 0) {
            echo "File Name :" . $file->getName();
            echo "<br/>File Random Name :" . $file->getRandomName();
            echo "<br/>File Size :" . $file->getSize();
            echo "<br/>File Extension :" . $file->getExtension();

            $file->move('./public/upload', $file->getRandomName());
        }*/

        $request = service('request');
        helper(['form', 'url']);
        $this->Mg_modul = new Mg_modul();

        $data = array(
            'id_modul' => $request->getPost('id_modul'),
            'nama' => $request->getPost('nama'),
            'jurusan' => $request->getPost('jurusan'),
            'jumlah' => $request->getPost('jumlah'),
        );
        $insert = $this->Mg_modul->modul_add($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit($id)
    {

        $this->modul_model = new Mg_modul();

        $data = $this->modul_model->get_by_id($id);

        echo json_encode($data);
    }

    public function modul_update()
    {
        $request = service('request');
        helper(['form', 'url']);
        $this->modul_model = new Mg_modul();

        $data = array(
            'id_modul' => $request->getPost('id_modul'),
            'nama' => $request->getPost('nama'),
            'jurusan' => $request->getPost('jurusan'),
            'jumlah' => $request->getPost('jumlah'),
        );
        $this->modul_model->modul_update(array('id_modul' => $request->getPost('id_modul')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function modul_delete($id)
    {

        helper(['form', 'url']);
        $this->modul_model = new Mg_modul();
        $this->modul_model->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
}
