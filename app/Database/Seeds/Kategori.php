<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kategori extends Seeder
{
    public function run()
    {
        $data = [
            'nama' => 'politik'
        ];

        $this->db->table('kategori')->insert($data);
    }
}
