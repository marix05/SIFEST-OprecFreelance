<?php

namespace Database\Seeders;

use App\Models\Mahasiswa2022;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Mahasiswa2022Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mahasiswa2022::truncate();
  
        $csvFile = fopen(base_path("database/data/DataMahasiswa2022.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 1000, ";")) !== FALSE) {
            if (!$firstline) {
                Mahasiswa2022::create([
                    "NIM" => $data['1'] ?? "None",
                    "name" => $data['2'] ?? "None",
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
