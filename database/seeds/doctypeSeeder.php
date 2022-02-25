<?php

use Illuminate\Database\Seeder;

class doctypeSeeder extends Seeder
{
    public function run()
    {
        $doc_types = [
            ['code' => 'LIP', 'description' => 'Lib Pune', 'module' => 'HR'],
            ['code' => 'LIS', 'description' => 'Lib Sigurime', 'module' => 'HR'],
            ['code' => 'KNT', 'description' => 'Kontrate', 'module' => 'HR'],
            ['code' => 'KID', 'description' => 'Karte ID', 'module' => 'HR'],
            ['code' => 'PAT', 'description' => 'Patente', 'module' => 'HR'],
            ['code' => 'RMJ', 'description' => 'Rap. Mjeksor', 'module' => 'HR'],
        ];

        DB::table('doc_type')
            ->insert($doc_types);
    }
}
