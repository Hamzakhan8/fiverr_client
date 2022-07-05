<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CampaignSeeder::class,
            OpticianSeeder::class,
            //  CampaignSeeder::class,
            EventSeeder::class,
            CustomerListSeeder::class,
            CreateCustomer::class,

        ]);
    }
}
