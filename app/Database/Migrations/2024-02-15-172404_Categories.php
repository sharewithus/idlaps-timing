<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categories extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel news
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
            'status' => [
                'type' => 'INT',
                'constraint' => '1',
                'unsigned' => true
            ],
            'event_id' => [
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => true
            ],
			'start_race' => [
                'type' => 'TIME',
                'null' => true,
            ],
			'end_race' => [
                'type' => 'TIME',
                'null' => true,
            ],
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('categories', TRUE);
    }

    public function down()
    {
        
		$this->forge->dropTable('categories');
    }
}
