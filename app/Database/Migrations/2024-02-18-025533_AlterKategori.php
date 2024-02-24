<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterKategori extends Migration
{
    public function up()
    {
        $this->forge->addColumn('categories', [
			'lap INT(3) DEFAULT 1'
		]);
    }

    public function down()
    {
        //
    }
}
