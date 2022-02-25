<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $positions = [
            [ 'code' => 'SFIN', 'description' => 'Specialist Finance'],
            [ 'code' => 'PFIN', 'description' => 'Pergjegjes Finance'],
        ];

        DB::table('hr_job_positions')
            ->insert($positions);

        $departments = [
            ['code' => 'FIN', 'description' => 'Finance'],
            ['code' => 'HR', 'description' => 'Human Resources'],
        ];

        DB::table('departments')
            ->insert($departments);

        $levels = [
            ['code' => 'I', 'description' => 'First', 'amount' => 0, 'position_id' => 1],
            ['code' => 'II', 'description' => 'Second', 'amount' => 0, 'position_id' => 1],
            ['code' => 'I', 'description' => 'First', 'amount' => 0, 'position_id' => 2],
            ['code' => 'II', 'description' => 'Second', 'amount' => 0, 'position_id' => 2],
        ];

        DB::table('hr_jp_level')
            ->insert($levels);

        $this->call(doctypeSeeder::class);

    }
}
