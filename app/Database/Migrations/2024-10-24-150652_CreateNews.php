<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNews extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_news' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'judul_berita' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'isi_berita' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addPrimaryKey('id_news');
        $this->forge->createTable('news');
    }

    public function down()
    {
        $this->forge->dropTable('news');
    }
}
