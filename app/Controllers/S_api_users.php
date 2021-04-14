<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\Ms_api_user;

class S_api_users extends ResourceController
{
    //protected $modelName = 'App\Models\Ms_api_user';
    protected $format = 'json';

    //untuk validation
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $session_id_user = user()->id;
        if (!empty($session_id_user)) {
            $this->Ms_api_user = new Ms_api_user();
            $data['users'] = $this->Ms_api_user->Users_get_praktikum_id($session_id_user);
            if (!empty($data['users'])) {
                if ($data['users']->status == 1) {
                    $data['pretest'] = $this->Ms_api_user->Users_get_pretest_id($session_id_user);
                    $data['postest'] = $this->Ms_api_user->Users_get_postest_id($session_id_user);
                    $data['experiment'] = $this->Ms_api_user->Users_get_experiment_id($session_id_user);
                    $data['massage'] = array(
                        'statusAkses' => '1',
                        'pesan' => "Data Success Di Akses",
                    );
                    return $this->respond($data);
                } else {
                    $pesanError['massage'] = array(
                        'statusAkses' => '0',
                        'pesan' => "Maaf data ini tidak bisa di akses",
                    );
                    return $this->respond($pesanError);
                }
            } else {
                $pesanError['massage'] = array(
                    'statusAkses' => '0',
                    'pesan' => "Maaf data ini tidak bisa di akses",
                );
                return $this->respond($pesanError);
            }
        } else {
            $pesanError['massage'] = array(
                'statusAkses' => '0',
                'pesan' => "Maaf data ini tidak bisa di akses",
            );
            return $this->respond($pesanError);
        }
    }



    /*public function create()
    {
        $data = $this->request->getPost();
        $validate = $this->validation->run($data, 'register');
        $errors = $this->validation->getErrors();

        if ($errors) {
            return $this->fail($errors);
        }

        $user = new \App\Entities\Users();
        $user->fill($data);
        $user->created_by = 0;
        $user->created_date = date("Y-m-d H:i:s");

        if ($this->model->save($user)) {
            return $this->respondCreated($user, 'user created');
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getRawInput();
        $data['id'] = $id;
        $validate = $this->validation->run($data, 'update_user');
        $errors = $this->validation->getErrors();

        if ($errors) {
            return $this->fail($errors);
        }

        if (!$this->model->findById($id)) {
            return $this->fail('id tidak ditemukan');
        }

        $user = new \App\Entities\Users();
        $user->fill($data);
        $user->updated_by = 0;
        $user->updated_date = date("Y-m-d H:i:s");

        if ($this->model->save($user)) {
            return $this->respondUpdated($user, 'user updated');
        }
    }

    public function delete($id = null)
    {
        if (!$this->model->findById($id)) {
            return $this->fail('id tidak ditemukan');
        }

        if ($this->model->delete($id)) {
            return $this->respondDeleted(['id' => $id . ' Deleted']);
        }
    }

    public function show($id = null)
    {
        $data = $this->model->findById($id);

        if ($data) {
            return $this->respond($data);
        }

        return $this->fail('id tidak ditemukan');
    }*/
}
