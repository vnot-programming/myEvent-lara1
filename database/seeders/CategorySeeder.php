<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('categories')->insert([
            [
                'name'=>'Kategori1',
                'slug'=>'kategori1',
                'status'=>true
            ],
            [
                'name'=>'Kategori2',
                'slug'=>'kategori2',
                'status'=>true
            ],
            [
                'name'=>'Kategori3',
                'slug'=>'kategori3',
                'status'=>true
            ]
        ]);
    }
}
