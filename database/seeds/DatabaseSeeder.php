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
            'default_name' => 'vNext',
            'default_short' => 'vNext',
            'default_acronym' => 'vN',
            'xbox_name' => 'vNext',
            'xbox_short' => 'vNext',
            'xbox_acronym' => 'vN',
            'other_name' => 'vNext',
            'other_short' => 'vNext',
            'other_acronym' => 'vN'
        ]);

        DB::table('rings')->insert([
            'id' => '2',
            'default_name' => 'Fast Ring',
            'default_short' => 'Fast',
            'default_acronym' => 'FR',
            'xbox_name' => 'Alpha Ring',
            'xbox_short' => 'Alpha',
            'xbox_acronym' => 'AR',
            'other_name' => 'Fast Ring',
            'other_short' => 'Fast',
            'other_acronym' => 'FR'
        ]);

        DB::table('rings')->insert([
            'id' => '3',
            'default_name' => 'Slow Ring',
            'default_short' => 'Slow',
            'default_acronym' => 'SR',
            'xbox_name' => 'Beta Ring',
            'xbox_short' => 'Beta',
            'xbox_acronym' => 'BR',
            'other_name' => 'Preview',
            'other_short' => 'Preview',
            'other_acronym' => 'Pre'
        ]);

        DB::table('rings')->insert([
            'id' => '4',
            'default_name' => 'Preview Ring',
            'default_short' => 'Preview',
            'default_acronym' => 'PR',
            'xbox_name' => 'Ring 3',
            'xbox_short' => 'Ring 3',
            'xbox_acronym' => 'R3',
            'other_name' => 'Preview Ring',
            'other_short' => 'Preview',
            'other_acronym' => 'PR'
        ]);

        DB::table('rings')->insert([
            'id' => '5',
            'default_name' => 'Release Preview Ring',
            'default_short' => 'Release Preview',
            'default_acronym' => 'RPR',
            'xbox_name' => 'Ring 4',
            'xbox_short' => 'Ring 4',
            'xbox_acronym' => 'R4',
            'other_name' => 'Release Preview Ring',
            'other_short' => 'Release Preview',
            'other_acronym' => 'RPR'
        ]);

        DB::table('rings')->insert([
            'id' => '6',
            'default_name' => 'Semi-Annual Pilot Channel',
            'default_short' => 'Pilot',
            'default_acronym' => 'SAP',
            'xbox_name' => 'Release',
            'xbox_short' => 'Release',
            'xbox_acronym' => 'Rel',
            'other_name' => 'Semi-Annual Pilot Channel',
            'other_short' => 'Pilot',
            'other_acronym' => 'SAP'
        ]);

        DB::table('rings')->insert([
            'id' => '7',
            'default_name' => 'Semi-Annual Broad Channel',
            'default_short' => 'Broad',
            'default_acronym' => 'SAB',
            'xbox_name' => 'Semi-Annual Broad Channel',
            'xbox_short' => 'Broad',
            'xbox_acronym' => 'SAB',
            'other_name' => 'Semi-Annual Broad Channel',
            'other_short' => 'Broad',
            'other_acronym' => 'SAB'
        ]);

        DB::table('rings')->insert([
            'id' => '8',
            'default_name' => 'Long-Term Support Channel',
            'default_short' => 'Long-Term Support',
            'default_acronym' => 'LTS',
            'xbox_name' => 'Long-Term Support Channel',
            'xbox_short' => 'Long-Term Support',
            'xbox_acronym' => 'LTS',
            'other_name' => 'Long-Term Support Channel',
            'other_short' => 'Long-Term Support',
            'other_acronym' => 'LTS'
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
            'description' => 'The Fall Creators Update is the second and final update for 2017, expected at the end of the year. This update will bring along previously announced features like MyPeople, but also the Fluent design language and an adaptive shell for Mobile.'
        ]);

        DB::table('milestones')->insert([
            'id' => 'redstone2',
            'os' => 'Windows 10',
            'name' => 'Creators Update',
            'codename' => 'Redstone 2',
            'version' => '1703',
            'color' => '#88b71e',
            'description' => 'The Creators Update is the first update out of 2 for 2017. Although Microsoft heavily focused on creativity during the announcement of the update, there is plenty new across the board, including a new Defender, improved accessibility and more.'
        ]);

        DB::table('milestones')->insert([
            'id' => 'redstone1',
            'os' => 'Windows 10',
            'name' => 'Anniversary Update',
            'codename' => 'Redstone 1',
            'version' => '1607',
            'color' => '#cb3115',
            'description' => 'The Windows 10 Anniversary Update is released 1 year (give or take 4 days) after the original version of Windows 10 and will be the only update in 2016. It is the first update that will be available to all platforms, that being PC, Mobile, Xbox, Server, Holographic, Team and IoT.'
        ]);

        DB::table('milestones')->insert([
            'id' => 'threshold2',
            'os' => 'Windows 10',
            'name' => 'November Update',
            'codename' => 'Threshold 2',
            'version' => '1511',
            'color' => '#0058af',
            'description' => 'The November Update was the first minor feature update to Windows 10 for PCs and IoT and was released in November 2015. It is also the first build to have a stable Mobile and Xbox release, released to the public in March 2016 and November 2015, respectively.'
        ]);

        DB::table('milestones')->insert([
            'id' => 'threshold1',
            'os' => 'Windows 10',
            'name' => '',
            'codename' => 'Threshold 1',
            'version' => '1507',
            'color' => '#0078d7',
            'description' => 'The original version of Windows 10 is the first version of Windows to utilize the Windows Insider Program for its development. Public previewing started in October 2014. While this version is only stable for PC and IoT, there are also preview builds for Mobile and Server from the Threshold 1 branches, but neither have a stable release.'
        ]);

        DB::table('milestones')->insert([
            'id' => 'blue',
            'os' => 'Windows 8.1',
            'name' => '',
            'codename' => 'Blue',
            'version' => '1310',
            'color' => '#00abef',
            'description' => 'Windows 8.1 was a free update to Windows 8 and the start of universal Windows apps as both Windows 8.1 and Windows Phone 8.1 could run the same apps with minor changes.'
        ]);

        DB::table('milestones')->insert([
            'id' => 'eight',
            'os' => 'Windows 8',
            'name' => '',
            'codename' => '8',
            'version' => '1210',
            'color' => '#68217a',
            'description' => 'Windows 8 is the first version of Windows to bring the Modern UI to the desktop and the start of the convergence between all Windows variations.'
        ]);
    }
}
