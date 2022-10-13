<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class IncomeTable extends Migration
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
            'notes' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'cat_id' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'amount' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'date' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],



        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('incomes');


    }

    public function down()
    {
        $this->forge->dropTable('incomes');

    }
}
