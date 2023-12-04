<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ReclamationSeeder extends Seeder
{
    public function run()
    {
        // Sample data for the "reclamation" table
        $data = [
            [
                'NumReclamation' => 1,
                'CorpReclamation' => 'Sample Reclamation 1',
                'DateReclamation' => '2023-01-01',
                'PseudoNom' => 'User1',
            ],
            [
                'NumReclamation' => 2,
                'CorpReclamation' => 'Sample Reclamation 2',
                'DateReclamation' => '2023-01-02',
                'PseudoNom' => 'User2',
            ],
            // Add more data as needed
        ];

        // Insert data into the "reclamation" table
        $this->db->table('reclamation')->insertBatch($data);
    }
}
