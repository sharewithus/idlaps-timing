<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterRace extends Migration
{
    public function up()
    {
        $this->forge->addColumn('race', 
        [
            'kategori_id' => [
            'type' => 'INT',
            'constraint' => '11',
            'unsigned' => true
        ]
		]);

        $this->forge->addColumn('timing', [
			'mac VARCHAR(255) DEFAULT NULL'
		]);
    }

    public function down()
    {
        //
    }
}
