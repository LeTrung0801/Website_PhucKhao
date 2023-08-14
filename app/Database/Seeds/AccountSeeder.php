<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AccountSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'email' => 'admin@gmail.com',
                'password' => password_hash('123123', PASSWORD_BCRYPT),
                'name' => 'Admin',
                'phone' => '0123456789',
            ],
            [
                'email' => 'bambee@gmail.com',
                'password' => password_hash('123123', PASSWORD_BCRYPT),
                'name' => 'BamBee',
                'phone' => '0123456789',
            ],
        ];

        $this->db->table('account')->insertBatch($data);
    }
}
