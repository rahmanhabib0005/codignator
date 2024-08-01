<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Images extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'auto_increment' => true,
                'constraint' => 19
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'path' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('images');
    }

    public function down()
    {
        $this->forge->dropTable('images');
    }
}
