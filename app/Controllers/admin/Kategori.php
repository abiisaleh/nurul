<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $KategoriModel;

    public function __construct()
    {
        $this->KategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data['title'] = 'Data Kategori';
        return view('admin/kategori', $data);
    }

    public function show()
    {
        $data['data'] = $this->KategoriModel->find();
        $kodefikasi = $this->KategoriModel->kodefikasi($data);

        return $this->response->setJSON($kodefikasi);
    }

    public function save()
    {
        $data = $this->request->getPost();
        $this->KategoriModel->save($data);
    }

    public function delete()
    {
        $data = $this->request->getPost('id');
        $this->KategoriModel->delete($data);
    }
}
