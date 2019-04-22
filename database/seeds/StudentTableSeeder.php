<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('students')->insert([
            ['name' => 'cherry','age' => 18],
            ['name' => 'cherry2','age' => 15],
            ['name' => 'cherry3','age' => 17]
        ]);
    }
}
