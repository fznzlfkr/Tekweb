<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
    $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'nama_barang' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'varian' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'harga_beli' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'harga_jual' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
