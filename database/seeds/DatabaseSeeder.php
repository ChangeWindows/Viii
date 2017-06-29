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

        DB::table('milestones')->insert([
            'id' => 'redstone3',
            'os' => 'Windows 10',
            'name' => 'Fall Creators Update',
            'codename' => 'Redstone 3',
            'version' => '1709',
            'color' => '#ffba08',
            'description' => 'The Redstone 3 update is the second and final update for 2017, expected at the end of the year. This update will bring along previously announced features like MyPeople, but also the long expected Project NEON design language and an adaptive shell for Mobile.'
        ]);
    }
}
