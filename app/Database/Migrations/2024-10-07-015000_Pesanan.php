<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pesanan extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id_pesanan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'tanggal_pesan'      => [
                'type'       => 'TIMESTAMP',
                'default'    => 'CURRENT_TIMESTAMP',
            ],
            'total_harga'       => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'status'            => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'completed', 'canceled'],
                'default'    => 'pending',
            ],
        ]);
        $this->forge->addPrimaryKey('id_pesanan');
    }

    public function down()
    {
        $this->forge->dropTable('pesanan');
    }
}
