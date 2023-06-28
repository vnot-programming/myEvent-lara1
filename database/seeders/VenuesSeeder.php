<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VenuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('venues')->insert([
            [
                'tittle'=>'Venue 1',
                'slug'=>'venue-1',
                'description'=>'description1',
                'type'=>'type1'
            ],
            [
                'tittle'=>'Venue 2',
                'slug'=>'venue-2',
                'description'=>'description2',
                'type'=>'type2'
            ],
            [
                'tittle'=>'Venue 3',
                'slug'=>'venue-3',
                'description'=>'description3',
                'type'=>'type3'
            ]
        ]);
    }
}
