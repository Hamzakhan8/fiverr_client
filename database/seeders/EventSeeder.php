<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = Event::create([
            'name' => 'Advent',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $event = Event::create([
            'name' => 'Frau',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $event = Event::create([
            'name' => 'Mann',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
