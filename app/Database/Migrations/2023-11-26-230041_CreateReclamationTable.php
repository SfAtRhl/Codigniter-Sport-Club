<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateReclamationTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'NumReclamation' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'CorpReclamation' => [
                'type' => 'TEXT',
                'character set' => 'utf8mb3',
                'collate' => 'utf8mb3_bin',
            ],
            'DateReclamation' => [
                'type' => 'DATE',
            ],
            'PseudoNom' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'character set' => 'utf8mb3',
                'collate' => 'utf8mb3_bin',
            ],
            'Status' => [
                'type' => 'ENUM',
                'constraint' => ['Pending', 'Accept', 'Decline'],
                'default' => 'Pending',
            ],
        ]);

        $this->forge->addKey('NumReclamation', true);
        $this->forge->createTable('reclamation');
    }

    public function down()
    {
        $this->forge->dropTable('reclamation');
    }
}
