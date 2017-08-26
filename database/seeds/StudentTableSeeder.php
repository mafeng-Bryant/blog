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
        DB::table('ma_student')->insert([[
            'name'=>'121','age'=>100],['name'=>'222','age'=>200]]);
    }
}
