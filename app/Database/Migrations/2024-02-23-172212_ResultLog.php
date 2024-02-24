<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ResultLog extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel news
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'bib'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 5
			],
            'time' => [
				'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
			'mac' => [
				'type'           => 'VARCHAR',
                'constraint'    => 255
            ],
			'lap' => [
				'type' => 'INT',
				'constranint' => 5,
			]
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('result_logs', TRUE);
    }

    public function down()
    {
        
		$this->forge->dropTable('result_logs');
    }
}
