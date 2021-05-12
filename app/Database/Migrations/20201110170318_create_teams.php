<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Migration_Create_Teams extends Migration {
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
            'teamchef' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'motor' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'sitz' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            )
        ));
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('teams');


    }

    public function down()
    {
        $this->forge->dropTable('teams');
    }
}