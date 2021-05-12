<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Migration_Update_Drivers extends Migration {
    public function up()
    {
        $fields = array(
            'drivers_image' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
            )
        );
        $this->forge->addColumn('drivers', $fields);
    }

    public function down()
    {
        $this->forge->dropTable('users', 'dirvers_image');
    }
}