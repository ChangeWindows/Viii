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
        DB::table('users')->insert([
            'name' => 'Yannick',
            'email' => 'yannick@outlook.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('builds')->insert([
            'id' => '16226',
            'milestone_id' => 'redstone3'
        ]);

        DB::table('releases')->insert([
            'build_id' => '16226',
            'build_string' => '10.0.16226.1000',
            'platform' => '1',
            'ring' => '2',
            'release' => '2017-06-22'
        ]);
    }
}
