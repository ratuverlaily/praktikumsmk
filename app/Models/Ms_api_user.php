<?php

namespace App\Models;

use CodeIgniter\Model;

class Ms_api_user extends Model
{
    /*protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'username', 'firstname', 'lastname', 'address', 'age', 'avatar', 'password', 'salt', 'created_date', 'created_by', 'updated_date', 'updated_by'
    ];
    protected $returnType = 'App\Entities\Users';
    protected $useTimestamps = false;

    public function findById($id)
    {
        $data = $this->find($id);
        if ($data) {
            return $data;
        }
        return false;
    }*/

    var $table = 'users';

    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $builder = $db->table('users');
    }

    public function get_all_user()
    {
        $query = $this->db->query('select * from users');
        return $query->getResult();
    }

    public function Users_get_by_id($id)
    {
        $sql = 'select * from users where id =' . $id;
        $query =  $this->db->query($sql);

        return $query->getRow();
    }

    public function Users_get_praktikum_id($id)
    {
        $sql = 'select a.email as email, a.username as username, a.fullname as fullname, a.user_image as image, a.password_hash as password, b.status as status from users a INNER JOIN praktikum_status_siswa b ON a.id=b.id_user where a.id =' . $id;
        $query =  $this->db->query($sql);

        return $query->getRow();
    }

    public function Users_get_pretest_id($id)
    {
        $sql = 'select b.id_pretest as id, b.status as status, b.waktu as waktu, b.tanggal_finish as tanggal_selesai, b.tanggal as tanggal from users a INNER JOIN praktikum_pretest b ON a.id=b.id_user where a.id =' . $id;
        $query =  $this->db->query($sql);

        return $query->getRow();
    }

    public function Users_get_postest_id($id)
    {
        $sql = 'select b.id_posttes as id, b.status as status, b.waktu as waktu_pengerjaan, b.fault_counter as fault_counter, b.tanggal_finish as tanggal_selesai, b.tanggal as tanggal from users a INNER JOIN praktikum_posttest b ON a.id=b.id_user where a.id =' . $id;
        $query =  $this->db->query($sql);

        return $query->getResult();
    }

    public function Users_get_experiment_id($id)
    {
        $sql = 'select b.id_experiment  as id, b.waktu as waktu_pengerjaan, b.tanggal_finish as tanggal_selesai, b.tanggal as tanggal from users a INNER JOIN praktikum_experiment b ON a.id=b.id_user where a.id =' . $id;
        $query =  $this->db->query($sql);

        return $query->getResult();
    }
}
