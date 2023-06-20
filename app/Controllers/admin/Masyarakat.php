<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\MasyarakatModel;
use CodeIgniter\I18n\Time;

class Masyarakat extends BaseController
{
    protected $MasyarakatModel;

    public function __construct()
    {
        $this->MasyarakatModel = new MasyarakatModel();
    }

    public function index()
    {
        $data['title'] = 'Data Masyarakat';
        return view('admin/masyarakat', $data);
    }

    public function show()
    {
        $data['data'] = $this->MasyarakatModel->find();

        $kodefikasi = $this->MasyarakatModel->kodefikasi($data);

        return $this->response->setJSON($kodefikasi);
    }

    public function save()
    {
        $data = $this->request->getPost();
        $this->MasyarakatModel->save($data);

        if (!$this->request->isAJAX()) {
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->back();
        }
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $this->MasyarakatModel->delete($id);
    }
}
