<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableAccount extends Migration
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
            'email' => [
                'type' => 'TEXT',
                'constraint' => '255',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'name' => [
                'type' => 'TEXT',
                'constraint' => '255',
            ],
            'phone' => [
                'type' => 'TEXT',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('account');
    }

    public function down()
    {
        $this->forge->dropTable('account');
    }
}
