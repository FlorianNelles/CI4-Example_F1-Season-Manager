<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 2,
                'title' => "Erste Nachricht",
                'slug' => "Erste-Nachricht",
                'body' => "_Dies ist die erste Nachricht\nbearbeitet\n",
                'created_at' => "2020-10-14 19:41:52",
                'user_id' => 1
            ], [
                'id' => 13,
                'title' => "neue message",
                'slug' => "neue-message",
                'body' => "abc",
                'created_at' => "2020-11-02 16:02:04",
                'user_id' => 8
            ], [
                'id' => 17,
                'title' => "test1",
                'slug' => "test1",
                'body' => "adsga",
                'created_at' => "2020-11-03 16:44:10",
                'user_id' => 2
            ],
        ];

        // Simple Queries
        //$this->db->query("INSERT INTO users (id, name, email, usernam, password, register_date) VALUES(:id:, :name:, :email:, :username:, :password:, :register_date:)", $data);

        // Using Query Builder
        $this->db->table('posts')->insertBatch($data);
    }
}