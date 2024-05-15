<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        // Define the columns for the "barang" table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'harga' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false
            ],
            'stok' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);

        // Add primary key
        $this->forge->addKey('id', true);

        // Create the table
        $this->forge->createTable('barang');
    }

    public function down()
    {
        // Drop the "barang" table
        $this->forge->dropTable('barang');
    }
}
