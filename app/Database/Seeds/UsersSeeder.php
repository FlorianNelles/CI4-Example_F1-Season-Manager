<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => "admin",
                'email' => "admin@email.d",
                'username' => "admin",
                'password' => "e3274be5c857fb42ab72d786e281b4b8",
                'register_date' => "2020-11-02 16:05:46"
            ], [
                'id' => 2,
                'name' => "Florian Nelles",
                'email' => "abc@email.de",
                'username' => "Flo",
                'password' => "900150983cd24fb0d6963f7d28e17f72",
                'register_date' => "2020-11-02 14:17:20"
            ], [
                'id' => 8,
                'name' => "test",
                'email' => "test@test",
                'username' => "test",
                'password' => "912ec803b2ce49e4a541068d495ab570",
                'register_date' => "2020-11-02 15:33:21"
            ]
        ];

        // Simple Queries
        //$this->db->query("INSERT INTO users (id, name, email, usernam, password, register_date) VALUES(:id:, :name:, :email:, :username:, :password:, :register_date:)", $data);

        // Using Query Builder
        $this->db->table('users')->insertBatch($data);
    }
}