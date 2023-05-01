<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\PeminjamanModel;

class Peminjaman extends BaseController
{
    protected $PeminjamanModel;

    public function __construct()
    {
        $this->PeminjamanModel = new PeminjamanModel();
    }

    public function index()
    {
        $data['title'] = 'Data Peminjaman';
        return view('admin/peminjaman', $data);
    }

    public function show()
    {
        $data['data'] = $this->PeminjamanModel->ebook()->masyarakat()->find();
        $kodefikasi = $this->PeminjamanModel->kodefikasi($data);

        return $this->response->setJSON($kodefikasi);
    }

    public function save()
    {
        $data = $this->request->getPost();
        $this->PeminjamanModel->save($data);
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $this->PeminjamanModel->delete($id);
    }
}
