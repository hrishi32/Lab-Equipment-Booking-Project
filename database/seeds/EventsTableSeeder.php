<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Events::class)
                ->times(50)
                ->create();
        
                // DB::table('events')->insert([
        //     'title'=>str_random(10),
        //     'eventDate'=>now(),
        //     'endDate'=>now(),
        //     'startTime'=>Carbon::createFromTime(11,15,0),
        //     'endTime'=>Carbon::createFromTime(13,45,0),
        //     'pid'=>3,
        //     'tl_id'=>1,
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
    }
}
