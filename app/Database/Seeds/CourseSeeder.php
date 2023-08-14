<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'course_id' => 'BODA1',
                'course_name' => 'Bóng đá 1',
            ],
            [
                'course_id' => 'BODA2',
                'course_name' => 'Bóng đá 2',
            ],
            [
                'course_id' => 'CALO1',
                'course_name' => 'Cầu lông 1',
            ],
            [
                'course_id' => 'CALO2',
                'course_name' => 'Cầu lông 2',
            ],
            [
                'course_id' => 'BODA1',
                'course_name' => 'Bóng đá 1',
            ],
            [
                'course_id' => 'BODA2',
                'course_name' => 'Bóng đá 2',
            ],
        ];

        $this->db->table('course')->insertBatch($data);
    }
}
