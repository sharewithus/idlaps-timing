<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterResultLog extends Migration
{
    public function up()
    {


        $this->forge->addColumn('result_logs', [
			'lap INT(5) DEFAULT NULL'
		]);
    }

    public function down()
    {
        //
    }
}
