<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Migration_Create_Users extends Migration {
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
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'unique' => true
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'unique' => true
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'register_date' => array(
                'type' => 'timestamp',
                'current_timestamp' => true
            )
        ));
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('users');


    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}