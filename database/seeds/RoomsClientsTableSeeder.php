<?php

use Illuminate\Database\Seeder;

class RoomsClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = \App\Room::all();

        foreach ($rooms as $room) {

            $room->clients()->attach(\App\Client::inRandomOrder()->first()->id, ['period_from' => now(), 'period_to' => now()->addDays(random_int(1, 5))]);
        }
    }
}
