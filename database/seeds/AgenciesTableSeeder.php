<?php

use Illuminate\Database\Seeder;

class AgenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agencies')->insert(
            ['name'=>'TravelGroup']
        );
        DB::table('agencies')->insert(
            ['name'=>'RogaiKopita']
        );
        DB::table('agencies')->insert(
            ['name'=>'TravelCompany']
        );

    }
}
