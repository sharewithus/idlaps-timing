<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Timing extends Migration
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
        'waktu' => [
            
            'type' => 'TIME',
            'null' => true,
        ]

    ]);

    // Membuat primary key
    $this->forge->addKey('id', TRUE);

    // Membuat tabel news
    $this->forge->createTable('timing', TRUE);
}

    public function down()
    {
        
        $this->forge->dropTable('timing');
    }
}
