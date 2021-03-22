<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Mg_kelas2;
use CodeIgniter\HTTP\IncomingRequest;

class G_kelas2 extends BaseController
{

    /*public function index()
    {
        return view('t_guru/kelas2');
    }

    public function upload()
    {
        $request = service('request');
        $file = $request->getFile('photo');
        if ($file->getSize() > 0) {
            echo "File Name :" . $file->getName();
            echo "<br/>File Random Name :" . $file->getRandomName();
            echo "<br/>File Size :" . $file->getSize();
            echo "<br/>File Extension :" . $file->getExtension();

            $file->move('./public/upload', $file->getRandomName());
        }

        return view('t_guru/kelas2');
    }*/

    public function index()
    {
        return view('t_guru/kelas2');
    }

    public function store()
    {
        helper(['form', 'url']);

        $db      = \Config\Database::connect();
        $builder = $db->table('file');

        $validated = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[file,4096]',
            ],
        ]);

        $response = [
            'success' => false,
            'data' => '',
            'msg' => "Image has not been uploaded successfully"
        ];

        if ($validated) {
            $request = service('request');
            $avatar = $request->getFile('file');
            $avatar->move(WRITEPATH . 'uploads');

            $data = [

                'name' =>  $avatar->getClientName(),
                'type'  => $avatar->getClientMimeType()
            ];

            $save = $builder->insert($data);
            $response = [
                'success' => true,
                'data' => $save,
                'msg' => "Image has been uploaded successfully"
            ];
        }

        return $this->response->setJSON($response);
    }
}
