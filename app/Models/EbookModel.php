<?php

namespace App\Models;

use CodeIgniter\Model;

class EbookModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ebook';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['judul', 'penulis', 'penerbit', 'rilis', 'fk_kategori', 'stok', 'waktu_peminjaman'];

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
    protected $afterFind      = ['sisa'];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function kategori()
    {
        return $this->join('kategori', 'fk_kategori = kategori.id')->select('ebook.*, kategori.nama as kategori');
    }

    public function populer()
    {
        return $this->join('peminjaman', 'fk_ebook = ebook.id')->kategori()->selectCount('ebook.id', 'total_dibaca')->groupBy('ebook.id');
    }

    public function terbaru()
    {
        return $this->orderBy('rilis', 'DESC');
    }

    public function cari($keyword)
    {
        return $this->like('judul', $keyword)->orLike('penulis', $keyword)->orLike('penerbit', $keyword);
    }

    public function kodefikasi($data)
    {
        foreach ($data['data'] as &$row) {
            $row['kode_id'] = 'B-' . str_pad($row['id'], 3, 0, STR_PAD_LEFT);
        }

        return $data;
    }

    public function sisa($data)
    {
        foreach ($data['data'] as &$ebook) {
            $dipinjam = $this->db->table('peminjaman')->where('fk_ebook', $ebook['id'])->where('status', 'pinjam')->countAllResults();

            // $dipinjam = $this->join('peminjaman', 'fk_ebook = ebook.id', 'LEFT')->where('status', 'pinjam')->where('ebook.id', $ebook['id'])->selectCount('peminjaman.id', 'sisa')->groupBy('ebook.id');

            $stok = $ebook['stok'];
            $ebook['sisa'] = $stok - $dipinjam;
        }

        return $data;
    }
}
