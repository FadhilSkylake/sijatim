<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVisitorLogsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ip' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'ip_address' => [
                'type'       => 'VARCHAR',
                'constraint' => 45, // Menyimpan IPv4 dan IPv6
            ],
            'referrer' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'visited_page' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'visit_time' => [
                'type' => 'DATETIME', // Menggunakan tipe DATETIME
                'null' => false,
            ],
        ]);
        $this->forge->addKey('id_ip', true);
        $this->forge->createTable('visitor_logs');
    }

    public function down()
    {
        $this->forge->dropTable('visitor_logs');
    }
}
