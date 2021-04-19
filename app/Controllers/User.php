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

            $getakses = "t_siswa/home";
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
        $this->Userdetail = new Userdetail();
        $valueuser = $this->Userdetail->getuserdetail();
        if (!empty($valueuser)) {
            $v_akses = $this->getuserakses();
            if (in_groups('siswa')) {
                if (empty($this->session->get('id_kelas'))) {
                    $data['kelasaktif'] = "BELUM TERDAFTAR";
                    $data['status_kelas'] = 0;
                    $v_halaman = 't_siswa/kelas';
                } else {
                    $data['kelasaktif'] = $this->session->get('nama');
                    $data['id_kelas'] = $this->session->get('id_kelas');
                    $v_halaman = $v_akses;
                }
            } else {
                $data['kelasaktif'] = $this->session->get('nama');
                $data['id_kelas'] = $this->session->get('id_kelas');
                $this->Mg_kelas = new Mg_kelas();
                $data['kelass'] = $this->Mg_kelas->get_all_kelas();
                $v_halaman = $v_akses;
            }
            return view($v_halaman, $data);
        } else {
            return view('auth/identitas');
        }
    }
}
