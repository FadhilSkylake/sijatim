<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrderItemsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_order_item' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'order_id' => [
                'type' => 'INT',
                'null' => false
            ],
            'produk_id' => [
                'type' => 'INT',
                'null' => false
            ],
            'jumlah' => [
                'type' => 'INT',
                'null' => false
            ],
            'subtotal' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false
            ],
        ]);
        $this->forge->addKey('id_order_item', true);
        $this->forge->createTable('order_items');
    }


    public function down()
    {
        //
    }
}
