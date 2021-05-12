<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TeamsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => "Mercedes",
                'teamchef' => "Toto Wolff",
                'motor' => "Mercedes",
                'sitz' => "Brackley, Vereinigtes Königreich"
            ], [
                'id' => 2,
                'name' => "Ferrari",
                'teamchef' => "Mattia Binotto",
                'motor' => "Ferrari",
                'sitz' => "Maranello, Italien"
            ], [
                'id' => 3,
                'name' => "Red Bull",
                'teamchef' => "Christian Horner",
                'motor' => "Honda",
                'sitz' => "Militon Keynes, Vereinigtes Königreich"
            ], [
                'id' => 4,
                'name' => "Renault",
                'teamchef' => "Cyril Abiteboul",
                'motor' => "Renault",
                'sitz' => "Viry-Chatillon, Frankreich"
            ], [
                'id' => 5,
                'name' => "McLaren",
                'teamchef' => "Andres Seidl",
                'motor' => "Renault",
                'sitz' => "Woking, Vereinigtes Königreich"
            ], [
                'id' => 6,
                'name' => "Racing Point",
                'teamchef' => "Otmar Szafnauer",
                'motor' => "Mercedes",
                'sitz' => "Silverstone, Vereinigtes Königreich"
            ], [
                'id' => 7,
                'name' => "AlphaTauri",
                'teamchef' => "Franz Tost",
                'motor' => "Honda",
                'sitz' => "Faenza, Italien"
            ], [
                'id' => 8,
                'name' => "Alfa Romeo",
                'teamchef' => "Frederic Vasseur",
                'motor' => "Ferrari",
                'sitz' => "Hinwil, Schweiz"
            ], [
                'id' => 9,
                'name' => "Haas",
                'teamchef' => "Günther Steiner",
                'motor' => "Ferrari",
                'sitz' => "Kannapolis, Vereinigte Staaten"
            ], [
                'id' => 10,
                'name' => "Williams",
                'teamchef' => "Simon Roberts",
                'motor' => "Mercedes",
                'sitz' => "Grove, Vereinigtes Königreich"
            ], [
                'id' => 11,
                'name' => "Eigenes Team",
                'teamchef' => "Eigener Chef",
                'motor' => "Eigenes Motor",
                'sitz' => "Eigener Sitz"
            ], [
                'id' => 12,
                'name' => "Kein Team",
                'teamchef' => "Kein Chef",
                'motor' => "Kein Motor",
                'sitz' => "Kein Sitz"
            ]
        ];

        // Simple Queries
        //$this->db->query("INSERT INTO users (id, name, email, usernam, password, register_date) VALUES(:id:, :name:, :email:, :username:, :password:, :register_date:)", $data);

        // Using Query Builder
        $this->db->table('teams')->insertBatch($data);
    }
}