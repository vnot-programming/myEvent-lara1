<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            [
                'tittle'=>'Event1',
                'venue_id'=>'1',
                'slug'=>'event1',
            ],
            [
                'tittle'=>'Event2',
                'venue_id'=>'1',
                'slug'=>'event2',
            ],
            [
                'tittle'=>'Event3',
                'venue_id'=>'2',
                'slug'=>'event3',
            ]
        ]);

        DB::table('event_tags')->insert([
            [
                'tittle'=>'Feri Febria',
                'slug'=>'feri-febria',
                'type'=>'Sponsor',
                'status'=>true,
            ]
        ]);
    }
}