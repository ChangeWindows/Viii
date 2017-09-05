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

        DB::table('milestones')->insert([
            'id' => 'redstone3',
            'os' => 'Windows 10',
            'name' => 'Fall Creators Update',
            'codename' => 'Redstone 3',
            'short' => 'rs3',
            'version' => '1709',
            'color' => '#ffba08',
            'description' => 'The Fall Creators Update is the second and final update for 2017, expected at the end of the year. This update will bring along previously announced features like MyPeople, but also the Fluent design language and an adaptive shell for Mobile.'
        ]);

        DB::table('milestones')->insert([
            'id' => 'redstone2',
            'os' => 'Windows 10',
            'name' => 'Creators Update',
            'codename' => 'Redstone 2',
            'short' => 'rs2',
            'version' => '1703',
            'color' => '#88b71e',
            'description' => 'The Creators Update is the first update out of 2 for 2017. Although Microsoft heavily focused on creativity during the announcement of the update, there is plenty new across the board, including a new Defender, improved accessibility and more.'
        ]);

        DB::table('milestones')->insert([
            'id' => 'redstone1',
            'os' => 'Windows 10',
            'name' => 'Anniversary Update',
            'codename' => 'Redstone 1',
            'short' => 'rs1',
            'version' => '1607',
            'color' => '#cb3115',
            'description' => 'The Windows 10 Anniversary Update is released 1 year (give or take 4 days) after the original version of Windows 10 and will be the only update in 2016. It is the first update that will be available to all platforms, that being PC, Mobile, Xbox, Server, Holographic, Team and IoT.'
        ]);

        DB::table('milestones')->insert([
            'id' => 'threshold2',
            'os' => 'Windows 10',
            'name' => 'November Update',
            'codename' => 'Threshold 2',
            'short' => 'th2',
            'version' => '1511',
            'color' => '#0058af',
            'description' => 'The November Update was the first minor feature update to Windows 10 for PCs and IoT and was released in November 2015. It is also the first build to have a stable Mobile and Xbox release, released to the public in March 2016 and November 2015, respectively.'
        ]);

        DB::table('milestones')->insert([
            'id' => 'threshold1',
            'os' => 'Windows 10',
            'name' => 'Windows 10',
            'codename' => 'Threshold 1',
            'short' => 'th2',
            'version' => '1507',
            'color' => '#0078d7',
            'description' => 'The original version of Windows 10 is the first version of Windows to utilize the Windows Insider Program for its development. Public previewing started in October 2014. While this version is only stable for PC and IoT, there are also preview builds for Mobile and Server from the Threshold 1 branches, but neither have a stable release.'
        ]);

        DB::table('milestones')->insert([
            'id' => 'blue',
            'os' => 'Windows 8.1',
            'name' => 'Windows 8.1',
            'codename' => 'Blue',
            'short' => 'bl',
            'version' => '1310',
            'color' => '#00abef',
            'description' => 'Windows 8.1 was a free update to Windows 8 and the start of universal Windows apps as both Windows 8.1 and Windows Phone 8.1 could run the same apps with minor changes.'
        ]);

        DB::table('milestones')->insert([
            'id' => 'eight',
            'os' => 'Windows 8',
            'name' => 'Windows 8',
            'codename' => '8',
            'short' => '8',
            'version' => '1210',
            'color' => '#68217a',
            'description' => 'Windows 8 is the first version of Windows to bring the Modern UI to the desktop and the start of the convergence between all Windows variations.'
        ]);

        DB::table('builds')->insert([
            'major' => '10',
            'minor' => '0',
            'build' => '16273',
            'delta' => '1000',
            'platform_id' => '1',
            'milestone_id' => 'redstone3',
            'vnext' => '2017-06-22',
            'skip' => '2017-06-22',
            'fast' => '2017-06-22',
            'slow' => '2017-06-22',
            'preview' => '2017-06-22',
            'release' => '2017-06-22',
            'pilot' => '2017-06-22',
            'broad' => '2017-06-22',
            'lts' => '2017-06-22',
            'changelog' => 'Fixes and enhancements'
        ]);
    }
}