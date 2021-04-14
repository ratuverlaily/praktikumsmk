<?php

namespace App\Controllers;

use App\Models\Mg_kelas;
use App\Models\Ms_siswa;
use App\Models\Userdetail;

class User extends BaseController
{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function getuserakses()
    {
        if (in_groups('siswa')) {
            $this->Ms_siswa = new Ms_siswa();
            $data = $this->Ms_siswa->get_kelas_by_user();
            $dt = json_encode($data);
            $hsl = json_decode($dt, true);
            $this->session->set($hsl);

            $getakses = "t_siswa/index";
        } else {
            $this->Mg_kelas = new Mg_kelas();
            $data = $this->Mg_kelas->get_onkelas();
            $dt = json_encode($data);
            $hsl = json_decode($dt, true);
            $this->session->set($hsl);

            $getakses = "t_guru/index";
        }

        return $getakses;
    }

    public function index()
    {
        /*$this->Userdetail = new Userdetail();
        $valueuser = $this->Userdetail->getuserdetail();
        //dd($data);


        if (!empty($valueuser)) {*/
        $v_akses = $this->getuserakses();
        if (in_groups('siswa')) {
            $data['kelasaktif'] = $this->session->get('nama');
            $data['id_kelas'] = $this->session->get('id_kelas');
        } else {
            $data['kelasaktif'] = $this->session->get('nama');
            $data['id_kelas'] = $this->session->get('id_kelas');
            $this->Mg_kelas = new Mg_kelas();
            $data['kelass'] = $this->Mg_kelas->get_all_kelas();
        }
        return view($v_akses, $data);
        /*} else {
            return view("auth/identitas");
            echo 2;
        }*/
    }
}
