<?php

use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run()
    {
        $positions = [
            ['code' => 'SFIN', 'description' => 'Specialist Finance'],
            ['code' => 'PFIN', 'description' => 'Pergjegjes Finance']
        ];

        DB::table('hr_job_positions')
            ->insert($positions);

        $levels = [
            ['code' => 'I' , 'description' => 'First', 'position_id' => 1, 'amount' => 0],
            ['code' => 'I' , 'description' => 'First', 'position_id' => 2, 'amount' => 0],
        ];

        DB::table('hr_jp_level')
            ->insert($levels);

        $departments = [
            ['code' => 'FIN' , 'description' => 'Finance'],
            ['code' => 'HR' , 'description' => 'Human Resources']
        ];

        DB::table('departments')
            ->insert($departments);
    }
}
