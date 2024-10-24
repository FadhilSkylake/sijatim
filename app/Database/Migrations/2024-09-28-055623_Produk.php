<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_produk' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_barang' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'harga_barang' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'berat_barang' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'stok_barang' => [
                'type' => 'int',
                'constraint' => 10
            ],
        ]);
        $this->forge->addKey('id_produk', true);
        $this->forge->createTable('produk');
    }

    public function down()
    {
        $this->forge->dropTable('produk');
    }
}
