<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'peminjaman';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tanggal_pinjam', 'tanggal_kembali', 'status', 'fk_masyarakat', 'fk_ebook'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_pinjam';
    protected $updatedField  = 'tanggal_kembali';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['cekStok', 'cekBuku', 'limit'];
    // protected $afterInsert    = ['updateTanggal'];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = ['timeleft'];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function ebook()
    {
        return $this->join('ebook', 'fk_ebook = ebook.id')->select('peminjaman.*, ebook.judul as ebook');
    }

    public function masyarakat()
    {
        return $this->join('masyarakat', 'fk_masyarakat = masyarakat.id')->select('peminjaman.*, masyarakat.nama as masyarakat');
    }

    public function mybook()
    {
        return $this->ebook()->masyarakat()->where('fk_user', user_id())->where('status', 'pinjam')->select('ebook.*, peminjaman.id as id');
    }

    public function cekStok($data)
    {
        $ebook = $data['data']['fk_ebook'];
        $jumlah = $this->db->table('ebook')->where('id', $ebook)->get()->getResultArray()[0]['stok'];

        $dipinjam = $this->where('fk_ebook', $ebook)->where('status', 'pinjam')->countAllResults();


        $stok = $jumlah - $dipinjam;

        if ($stok == 0) {
            session()->setFlashdata('pesan', 'stok sudah habis');
            return $data['data'] = []; //kosongkan data
        }

        $sisa = $jumlah - $dipinjam - 1;

        session()->setFlashdata('pesan', 'Buku Berhasil dipinjam. sisa stok ' . $sisa . ' buku');

        return $data;
    }

    public function cekBuku($data)
    {
        $ebook = $data['data']['fk_ebook'];
        $masyarakat = $data['data']['fk_masyarakat'];

        $cekBuku = $this->where('fk_ebook', $ebook)->where('fk_masyarakat', $masyarakat)->where('status', 'pinjam')->find();

        if (!empty($cekBuku)) {
            session()->setFlashdata('pesan', 'buku sudah dipinjam');
            return $data['data'] = []; //kosongkan data
        }

        return $data;
    }

    public function limit($data)
    {
        $masyarakat = $data['data']['fk_masyarakat'];
        $limit = 3;

        $dipinjam = $this->where('fk_masyarakat', $masyarakat)->where('status', 'pinjam')->countAllResults();

        if ($limit <= $dipinjam) {
            session()->setFlashdata('pesan', 'melebihi batas peminjaman (maksimal 3 buku)');
            return $data['data'] = []; //kosongkan data
        }

        return $data;
    }

    public function timeleft($data)
    {
        //cek sisa hari pengembalian
        if (!empty($data['data'])) {
            foreach ($data['data'] as &$Buku) {
                if ($Buku['status'] == 'pinjam') {
                    $startDate = date_create('now');
                    $endDate = date_create($Buku['tanggal_kembali']);
                    $Buku['sisa'] = date_diff($startDate, $endDate)->format('%a');

                    //kalau waktu pinjam sudah habis ubah status menjadi selesai
                    if ($Buku['sisa'] <= 0) {
                        $Buku['status'] = 'selesai';
                        $this->save($Buku);
                    }
                }
            }
        }

        return $data;
    }

    public function updateTanggal($data)
    {
        $waktu = $this->db->table('ebook')->where('id', $data['fk_ebook'])->get()->getResultArray()[0]['waktu_peminjaman'];
        $data['tanggal_kembali'] = date('Y-m-d', strtotime('+' . $waktu . ' days'));
        return $this->save($data);
    }

    public function kodefikasi($data)
    {
        foreach ($data['data'] as &$row) {
            $row['kode_id'] = 'P-' . str_pad($row['id'], 3, 0, STR_PAD_LEFT);
        }

        return $data;
    }

    public function onHold()
    {
        return $this->where('status', 'pinjam');
    }
}
