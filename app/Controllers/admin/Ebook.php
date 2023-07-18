<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\EbookModel;

class Ebook extends BaseController
{
    protected $EbookModel;
    protected $StokModel;

    public function __construct()
    {
        $this->EbookModel = new EbookModel();
    }

    public function index()
    {
        $data['title'] = 'Data Buku';
        return view('admin/ebook', $data);
    }

    public function show()
    {
        $data['data'] = $this->EbookModel->kategori()->find();
        $kodefikasi = $this->EbookModel->kodefikasi($data);

        return $this->response->setJSON($kodefikasi);
    }

    public function save()
    {
        $data = $this->request->getPost();
        //kalau sudah ada
        if ($this->EbookModel->find($data['id'])) {
            return $this->EbookModel->save($data);
        };
        $this->EbookModel->insert($data);

        $lastID = $this->EbookModel->getInsertID();

        $pathSampul = WRITEPATH . 'uploads/sampul.jpg';
        $pathBuku = WRITEPATH . 'uploads/buku.pdf';

        if (file_exists($pathSampul)) {
            $newPath = FCPATH . 'uploads/' . $lastID . '-sampul.jpg';
            rename($pathSampul, $newPath);
        }

        if (file_exists($pathBuku)) {
            $newPath = FCPATH . 'uploads/' . $lastID . '-buku.pdf';
            rename($pathBuku, $newPath);
        }
    }

    public function upload()
    {
        $files = $this->request->getFiles();

        foreach ($files as $file) {
            if ($file->getExtension() == 'pdf') {
                $namaFile = 'buku.pdf';
            } else {
                $namaFile = 'sampul.jpg';
            }
            $file->move(WRITEPATH . 'uploads', $namaFile, true);
        }

        return json_encode(['status' => 'success']);
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $this->EbookModel->delete($id);
    }
}
