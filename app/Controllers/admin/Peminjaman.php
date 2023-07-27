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

        $id = $this->request->getPost('id') ?? null;

        try {
            // $this->PeminjamanModel->save($data);
            if ($id) {
                $this->PeminjamanModel->update($id, ['status' => 'selesai']);
                session()->setFlashdata('pesan', 'buku berhasil dikembalikan');
            } else {
                $this->PeminjamanModel->updateTanggal($data);
            }
            $msg['pesan'] = session()->getFlashdata('pesan');
            return $this->response->setJSON($msg);
        } catch (\Throwable) {
            $msg['pesan'] = session()->getFlashdata('pesan');
            return $this->response->setJSON($msg);
        }
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $this->PeminjamanModel->delete($id);
    }
}
