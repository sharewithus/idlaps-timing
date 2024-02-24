<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class race extends Migration
{
    public function up()
    {
        // id rider
        // bib
        // nama
        // lap
        // status
        
        $this->forge->addField([
        'id'          => [
            'type'           => 'INT',
            'constraint'     => 11,
            'unsigned'       => true,
            'auto_increment' => true
        ],
        'id_racer'       => [
            'type'           => 'VARCHAR',
            'constraint'     => 255
        ],
        'bib'       => [
            'type'           => 'VARCHAR',
            'constraint'     => 10
        ],
        'status' => [
            'type' => 'VARCHAR',
            'constraint' => 10,
            'null' => true,
        ],
        'lap' => [
            'type' => 'INT',
            'constraint' => 3,
        ],
    ]);

    // Membuat primary key
    $this->forge->addKey('id', TRUE);

    // Membuat tabel news
    $this->forge->createTable('race', TRUE);
}

    public function down()
    {
        
        $this->forge->dropTable('race');
    }
}
