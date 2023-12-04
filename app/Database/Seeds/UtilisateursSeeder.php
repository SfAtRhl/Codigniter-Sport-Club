<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UtilisateursSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'Nom' => 'John',
                'Prenom' => 'Doe',
                'Adresse' => 'Safi',
                'Sexe' => 'F',
                'Profession' => 'Actor',
                'DateNaissance' => '12/04/2005',
                'Password' => password_hash('password123', PASSWORD_DEFAULT),
            ],
            // Add more sample data as needed
        ];

        // Insert data into the "utilisateurs" table
        $this->db->table('utilisateurs')->insertBatch($data);
    }
}
