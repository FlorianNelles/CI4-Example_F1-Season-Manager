<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Migration_Create_Posts extends Migration {
    public function up()
    {
        $this->forge->addField(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'slug' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'body' => array(
                'type' => 'TEXT',
            ),
            'created_at' => array(
                'type' => 'timestamp',
                'current_timestamp' => true
            ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 11,
            )
        ));
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('posts');

    }

    public function down()
    {
        $this->forge->dropTable('posts');
    }
}