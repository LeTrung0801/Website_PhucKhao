<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableCourse extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'course_id' => [
                'type' => 'TEXT',
                'constraint' => '255',
            ],
            'course_name' => [
                'type' => 'TEXT',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('course');
    }

    public function down()
    {
        $this->forge->dropTable('course');
    }
}
