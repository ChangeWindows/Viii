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
        
        DB::table('rings')->insert([
            'id' => '1',
            'name' => 'vNext',
            'short' => 'vNext',
            'acronym' => 'vN'
        ]);

        DB::table('rings')->insert([
            'id' => '2',
            'name' => 'Fast Ring',
            'short' => 'Fast',
            'acronym' => 'FR'
        ]);

        DB::table('rings')->insert([
            'id' => '3',
            'name' => 'Slow Ring',
            'short' => 'Slow',
            'acronym' => 'SR'
        ]);

        DB::table('rings')->insert([
            'id' => '4',
            'name' => 'Preview Ring',
            'short' => 'Preview',
            'acronym' => 'PR'
        ]);

        DB::table('rings')->insert([
            'id' => '5',
            'name' => 'Release Preview Ring',
            'short' => 'Release Preview',
            'acronym' => 'RPR'
        ]);

        DB::table('rings')->insert([
            'id' => '6',
            'name' => 'Semi-Annual Pilot Channel',
            'short' => 'Pilot',
            'acronym' => 'SAP'
        ]);

        DB::table('rings')->insert([
            'id' => '7',
            'name' => 'Semi-Annual Broad Channel',
            'short' => 'Broad',
            'acronym' => 'SAB'
        ]);

        DB::table('rings')->insert([
            'id' => '8',
            'name' => 'Long-Term Support Channel',
            'short' => 'Long-Term Support',
            'acronym' => 'LTS'
        ]);
        
        DB::table('platforms')->insert([
            'id' => '1',
            'name' => 'PC'
        ]);

        DB::table('platforms')->insert([
            'id' => '2',
            'name' => 'Mobile'
        ]);

        DB::table('platforms')->insert([
            'id' => '3',
            'name' => 'Xbox'
        ]);

        DB::table('platforms')->insert([
            'id' => '4',
            'name' => 'Server'
        ]);

        DB::table('platforms')->insert([
            'id' => '5',
            'name' => 'IoT'
        ]);

        DB::table('platforms')->insert([
            'id' => '6',
            'name' => 'Mixed Reality'
        ]);

        DB::table('platforms')->insert([
            'id' => '7',
            'name' => 'Team'
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
