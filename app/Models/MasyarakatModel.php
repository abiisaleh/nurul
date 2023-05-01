<?php

namespace App\Models;

use CodeIgniter\Model;

class MasyarakatModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'masyarakat';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'jenis_kelamin', 'alamat', 'telp', 'tanggal_lahir', 'fk_user'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function user($id)
    {
        return $this->where('fk_user', $id)->first();
    }

    public function monthUser()
    {
        return $this->db->table('users')->select('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('MONTH(created_at)')
            ->get()->getResultArray();
    }

    public function kodefikasi($data)
    {
        foreach ($data['data'] as &$row) {
            $row['kode_id'] = 'M-' . str_pad($row['id'], 3, 0, STR_PAD_LEFT);
        }

        return $data;
    }
}
