<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('tickets')->insert([
            [
                'slug'=>'biasa',
                'tittle'=>'Biasa',
                'event_id'=>'1',
                'price'=>'15000',
                'quantity'=>'9999',
                'customer_limit'=>'0',
            ],
            [
                'slug'=>'promo-2-tiket',
                'tittle'=>'Promo 2 Tiket',
                'event_id'=>'1',
                'price'=>'25000',
                'quantity'=>'99',
                'customer_limit'=>'2',
            ],
            [
                'slug'=>'promo-5-tiket',
                'tittle'=>'Promo 5 Tiket',
                'event_id'=>'1',
                'price'=>'50000',
                'quantity'=>'20',
                'customer_limit'=>'1',
            ]
        ]);
    }
}
