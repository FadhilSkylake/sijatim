<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateManageEmail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_email' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 50, // Menyimpan IPv4 dan IPv6
            ],
        ]);
        $this->forge->addKey('id_email', true);
        $this->forge->createTable('email_sub');
    }

    public function down()
    {
        $this->forge->dropTable('email_sub');
    }
}
