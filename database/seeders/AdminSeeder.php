<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();

        Admin::create([
            'username' => 'intiaja',
            'password' => bcrypt('sukses123'),
        ]);
        Admin::create([
            'username' => 'admininaja',
            'password' => bcrypt('amin123'),
        ]);
        Admin::create([
            'username' => 'sponsoraja',
            'password' => bcrypt('sponja123'),
        ]);
        Admin::create([
            'username' => 'competitionaja',
            'password' => bcrypt('coja123'),
        ]);
        Admin::create([
            'username' => 'seminaraja',
            'password' => bcrypt('seja123'),
        ]);

        Admin::create([
            'username' => 'buddiesaja',
            'password' => bcrypt('buja123'),
        ]);
        Admin::create([
            'username' => 'medparaja',
            'password' => bcrypt('medja123'),
        ]);
        Admin::create([
            'username' => 'marketingaja',
            'password' => bcrypt('maja123'),
        ]);
        Admin::create([
            'username' => 'designaja',
            'password' => bcrypt('deja123'),
        ]);
        Admin::create([
            'username' => 'videophotoaja',
            'password' => bcrypt('vipoja123'),
        ]);
        Admin::create([
            'username' => 'publicationaja',
            'password' => bcrypt('puja123'),
        ]);
        Admin::create([
            'username' => 'bazaaraja',
            'password' => bcrypt('baja123'),
        ]);
        Admin::create([
            'username' => 'consumptionaja',
            'password' => bcrypt('sumja123'),
        ]);
        Admin::create([
            'username' => 'equipmentnaja',
            'password' => bcrypt('eja123'),
        ]);

        
    }
}




