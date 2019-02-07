<?php

use Illuminate\Database\Seeder;

class ToursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tours')->insert(
            ['name'=>'Ты офигеешь!']
        );
        DB::table('tours')->insert(
            ['agency_id'=>'1']
        );
        DB::table('tours')->insert(
            ['country'=>'Украина']
        );
        DB::table('tours')->insert(
            ['hotel'=>'У мамы Гали']
        );
        DB::table('tours')->insert(
            ['meal_service'=>'OB']
        );
        DB::table('tours')->insert(
            ['city'=>'Знаменка']
        );
        DB::table('tours')->insert(
            ['room_capacity'=>'3']
        );
        DB::table('tours')->insert(
            ['price'=>'20000']
        );
        DB::table('tours')->insert(
            ['name'=>'Ты офигеешь!']
        );
    }
}
