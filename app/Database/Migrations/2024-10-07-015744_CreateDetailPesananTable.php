<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDetailPesananTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail'        => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'pesanan_id'       => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'produk_id'        => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'jumlah'          => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'harga'           => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'subtotal'         => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
        ]);
        $this->forge->addPrimaryKey('id_detail');
        $this->forge->addForeignKey('pesanan_id', 'pesanan', 'id_pesanan');
        $this->forge->addForeignKey('produk_id', 'produk', 'id_produk');
    }

    public function down()
    {
        $this->forge->dropTable('detail_pesanan');
    }
}
