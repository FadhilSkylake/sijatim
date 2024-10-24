<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateIpLogs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ip' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'ip_address' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'date' => [
                'type' => 'DATE',
            ],

        ]);
        $this->forge->addPrimaryKey('id_ip');
        $this->forge->createTable('ip_logs');
    }

    public function down()
    {
        $this->forge->dropTable('ip_logs');
    }
}
