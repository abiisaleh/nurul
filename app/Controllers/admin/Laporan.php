<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Laporan extends BaseController
{
    public function index()
    {
        $data['title'] = 'Laporan';
        $data['total']['buku'] = model('EbookModel')->CountAll();
        $data['total']['kategori'] = model('KategoriModel')->CountAll();
        return view('admin/laporan', $data);
    }
}
