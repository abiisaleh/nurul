<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $EbookModel = model('EbookModel');
        $MasyarakatModel = model('MasyarakatModel');
        $PeminjamanModel = model('PeminjamanModel');

        $data['title'] = 'Dashboard';
        $data['buku'] = $EbookModel->populer()->findAll(3);
        $data['count'] = [
            'buku' => $EbookModel->countAllResults(),
            'masyarakat' => $MasyarakatModel->countAllResults(),
            'peminjaman' => $PeminjamanModel->countAllResults(),
        ];

        //data bulan dalam array
        $data['monthUser'] = $MasyarakatModel->monthUser();

        // Mengurutkan data array berdasarkan bulan
        usort($data['monthUser'], function ($a, $b) {
            return $a['month'] - $b['month'];
        });

        // Mengisi total ke dalam array yang diurutkan
        $totalArray = array_fill(0, 12, 0); // Membuat array kosong dengan 12 elemen
        foreach ($data['monthUser'] as $row) {
            $totalArray[$row['month'] - 1] = intval($row['total']); // Mengisi nilai total ke dalam array yang sesuai dengan bulan
        }

        // Menampilkan hasil array
        $data['graph'] = $totalArray;

        return view('admin/dashboard', $data);
    }
}
