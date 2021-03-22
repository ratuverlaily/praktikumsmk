<?php

namespace App\Controllers;

class User extends BaseController
{
    public function getuserakses()
    {
        if (in_groups('siswa')) {
            $getakses = "t_siswa/index";
        } else {
            $getakses = "t_guru/index";
        }

        return $getakses;
    }

    public function index()
    {
        $v_akses = $this->getuserakses();
        return view($v_akses);
    }
}
