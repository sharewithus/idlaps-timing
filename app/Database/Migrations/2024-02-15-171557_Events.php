<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Events extends Migration
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
			'lokasi'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
				'default'        => 'Belum ditentukan',
			],
            'waktu DATETIME DEFAULT CURRENT_TIMESTAMP',
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('events', TRUE);
    }

    public function down()
    {
        
		$this->forge->dropTable('events');
    }
}
