<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kategori';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama'];

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
    protected $afterFind      = ['totalBuku'];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function totalBuku($data)
    {
        foreach ($data['data'] as &$kategori) {
            $kategori['total'] = $this->db->table('ebook')->where('fk_kategori', $kategori['id'])->countAllResults();
        }

        return $data;
    }

    public function kodefikasi($data)
    {
        foreach ($data['data'] as &$row) {
            $row['kode_id'] = 'K-' . str_pad($row['id'], 3, 0, STR_PAD_LEFT);
        }

        return $data;
    }
}
