<?php

    namespace App\Database\Migrations;
    use CodeIgniter\Database\Migration;

    class CreateUserActivityLogs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                "null" => true,
            ],
            'user_name' => [
                'type' => 'VARCHAR',
                'constraint' => 191,
                'null' => true,
            ],
            'module' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'object_id' => [
                'type' => 'BEIGINT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'object_label' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'action' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'status_after' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'change_json' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'ip' => [
                'type' => 'VARCHAR',
                'constraint' => 45,
                'null' => true,
            ],
            'user_agent' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'occurred_at' => [
                'type' => 'DATETIME',
                'default' => 'CURRENT_TIMESTAMP',
                'null' => false,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('module','action');
        $this->forge->addKey('occurred_at');
        $this->forge->createTable('user_activity_logs', true);
    }

     public function down()
    {
        $this->forge->dropTable('user_activity_logs', true);
    }
}