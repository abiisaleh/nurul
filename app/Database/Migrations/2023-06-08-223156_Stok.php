<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Stok extends Migration
{
    public function up()
    {
        $field = [
            'stok' => [
                'type' => 'INT',
                'constraint' => 3
            ]
        ];

        $this->forge->addField('id');
        $this->forge->addField($field);
        $this->forge->createTable('stok');
        $this->forge->addPrimaryKey('id');
    }

    public function down()
    {
        $this->forge->dropTable('stok');
    }
}
