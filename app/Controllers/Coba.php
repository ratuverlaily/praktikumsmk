<?php

namespace App\Controllers;

class Coba extends BaseController
{
    public function index()
    {
        // return view('welcome_message');
        echo "ini method index dari class coba !!! yaaah $this->nama ";
    }

    public function coba()
    {
        echo "ini template coba";
    }

    public function about($nama = '', $umur = 0)
    {
        echo "cobaaaa $nama dan umur nya $umur";
    }
}
