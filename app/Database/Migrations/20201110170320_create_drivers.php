<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Migration_Create_Drivers extends Migration {
    public function up()
    {
        $this->forge->addField(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'startnr' => array(
                'type' => 'INT',
                'constraint' => 2,
            ),
            'team_id' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
            'points' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
        ));
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('drivers');


    }

    public function down()
    {
        $this->forge->dropTable('drivers');
    }
}