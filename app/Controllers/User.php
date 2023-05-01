<?php

namespace App\Controllers;

use App\Models\EbookModel;
use App\Models\KategoriModel;
use App\Models\MasyarakatModel;
use App\Models\PeminjamanModel;

class User extends BaseController
{
    protected $EbookModel;
    protected $KategoriModel;
    protected $MasyarakatModel;
    protected $PeminjamanModel;

    public function __construct()
    {
        $this->EbookModel = new EbookModel();
        $this->KategoriModel = new KategoriModel();
        $this->MasyarakatModel = new MasyarakatModel();
        $this->PeminjamanModel = new PeminjamanModel();
    }

    public function index()
    {
        $data['title'] = 'Terbaru';
        $data['terbaru'] = $this->EbookModel->kategori()->terbaru()->findAll(4);
        $data['populer'] = $this->EbookModel->populer()->findAll(4);
        $data['masyarakat'] = $this->MasyarakatModel->user(user_id());

        return view('user/index', $data);
    }

    public function pinjam()
    {
        $data['title'] = 'Pinjam';
        $data['buku'] = $this->PeminjamanModel->mybook()->find();

        return view('user/pinjam', $data);
    }

    public function buku()
    {
        $data['title'] = 'Buku';
        $data['masyarakat'] = $this->MasyarakatModel->user(user_id());
        $data['kategori'] = $this->KategoriModel->findAll();

        $keyword = $this->request->getVar('cari');
        $kategori = $this->request->getVar('kategori');
        $ebook = $this->EbookModel->kategori();


        if (!is_null($kategori)) {
            $ebook = $ebook->where('fk_kategori', $kategori);
        }

        if (!is_null($keyword)) {
            $ebook = $ebook->cari($keyword);
        }

        $data['keyword'] = $keyword;
        $data['ebook'] = $ebook->paginate('10');
        $data['pager'] = $ebook->pager->makeLinks(1, 10, $ebook->pager->getLastPage(), 'custom');

        return view('user/buku', $data);
    }

    public function user()
    {
        $data['title'] = 'Biodata';
        $data['user'] = $this->MasyarakatModel->where('fk_user', user_id())->first();

        return view('user/profile', $data);
    }

    public function upload()
    {
        $file = $this->request->getFile('avatar');
        $namaFile = user()->username . '-avatar.jpg';

        $file->move(FCPATH . 'uploads', $namaFile, true);
        return json_encode(['status' => 'success']);
    }

    public function about()
    {
        $data['title'] = 'Informasi';
        return view('user/informasi', $data);
    }

    public function baca($id)
    {
        return view('user/baca', ['id' => $id]);
    }
}
