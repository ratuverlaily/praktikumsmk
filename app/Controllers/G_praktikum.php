<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Mg_praktikum;
use App\Models\Mg_games;
use App\Models\Mg_kelas;
use App\Models\Mg_modul;
use App\Models\Mg_praktikum_kelas;

class G_praktikum extends BaseController
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
        $id_kelas = $this->session->get('id_kelas');
        $this->Mg_praktikum = new Mg_praktikum();
        $data['praktikums'] = $this->Mg_praktikum->get_all_by_id($id_kelas);
        $this->Mg_games = new Mg_games();
        $data['games'] = $this->Mg_games->get_all_games();
        $this->Mg_kelas = new Mg_kelas();
        $data['kelass'] = $this->Mg_kelas->get_all_kelas();
        $this->Mg_modul = new Mg_modul();
        $data['moduls'] = $this->Mg_modul->get_all_modul();
        $data['kelasaktif'] = $this->session->get('nama');
        $data['id_kelas'] = $this->session->get('id_kelas');

        return view('t_guru/praktikum', $data);
    }

    public function praktikum_add()
    {
        helper(['form', 'url']);
        $request = service('request');
        $judul = $request->getPost('judul');
        $komentar = $request->getPost('komentar');
        $tanggal_batas = $request->getPost('tanggal_batas');
        $waktu_batas = $request->getPost('waktu_batas');
        $tanggal_posting = $request->getPost('tanggal_posting');
        $waktu_posting = $request->getPost('waktu_posting');
        $games = $request->getPost('games');
        $kelas = $request->getPost('kelas');

        $this->Mg_praktikum = new Mg_praktikum();
        $dt = $this->Mg_praktikum->getlastid();

        if (empty($dt->id)) {
            $jml = 0;
        } else {
            $jml = $dt->id;
        }
        $idprak = $jml + 1;
        $data = array(
            'id_praktikum' => $idprak,
            'judul' => $judul,
            'komentar' => $komentar,
            'id_games' => $games,
            'id_user' => user()->id,
        );
        $insert = $this->Mg_praktikum->praktikum_add($data);

        $this->Mg_praktikum_kelas = new Mg_praktikum_kelas();
        foreach ($kelas as $kls) {
            $datakelas = array(
                'id_praktikum' => $idprak,
                'id_kelas' => $kls,
                'tgl_publis' => $tanggal_posting,
                'waktu_publis' => $waktu_posting,
                'tgl_batas' => $tanggal_batas,
                'waktu_batas' => $waktu_batas,
            );

            $this->Mg_praktikum_kelas->praktikum_kelas_add($datakelas);
        }

        echo json_encode(array("status" => TRUE));
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
