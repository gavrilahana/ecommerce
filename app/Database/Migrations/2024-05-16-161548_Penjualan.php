<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penjualan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama'        => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'alamat'      => [
                'type'           => 'TEXT',
            ],
            'hp'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '15',
            ],
            'kode_pos'    => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
            ],
            'total'       => [
                'type'           => 'DECIMAL',
                'constraint'     => '15,2',
            ],
            'created_at'  => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'updated_at'  => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'deleted_at'  => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('penjualan');
    }

    public function down()
    {
        $this->forge->dropTable('penjualan');
    }
}
