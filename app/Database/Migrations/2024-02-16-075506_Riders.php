<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Riders extends Migration
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
			'bib'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 10
			],
			'nama'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255
			],
			'jenis_kelamin'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 17,		
				'default'        => 'Belum ditentukan',
			],
            'tim' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
				'default'        => 'N/A TEAM',
            ],
            'provinsi_asal' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
				'default'        => 'Belum ditentukan',
				
            ],
			'tanggal_lahir' => [
                'type' => 'DATE',
                'null' => true,
            ],
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('riders', TRUE);
    }

    public function down()
    {
        
		$this->forge->dropTable('riders');
    }
}
