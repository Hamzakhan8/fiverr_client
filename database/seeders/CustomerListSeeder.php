<?php

namespace Database\Seeders;

use App\Models\CustomerList;
use Illuminate\Database\Seeder;

class CustomerListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = CustomerList::insert([
            [
                'optician_id' => 1,
                'campaign_id' => 1,
                'event_id' => 3,
                'name' => 'Brillen Guru Probelauf 1',
                'created_at' => date('Y-m-d H:i:s', strtotime('2022-04-10 16:05:20')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('2022-04-10 16:05:20')),
            ], [
                'optician_id' => 1,
                'campaign_id' => 1,
                'event_id' => 3,
                'name' => 'Probelauf Männer 2+3 ohne Umlaute',
                'created_at' => date('Y-m-d H:i:s', strtotime('2022-04-23 17:49:21')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('2022-04-23 17:49:21')),
            ], [
                'optician_id' => 1,
                'campaign_id' => 1,
                'event_id' => 3,
                'name' => 'Probelauf PLZ 3 ohne Umlaute',
                'created_at' => date('Y-m-d H:i:s', strtotime('2022-04-23 18:10:24')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('2022-04-23 18:10:24')),
            ], [
                'optician_id' => 1,
                'campaign_id' => 1,
                'event_id' => 3,
                'name' => 'Beispiel 10',
                'created_at' => date('Y-m-d H:i:s', strtotime('2022-05-18 11:29:49')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('2022-05-18 11:29:49')),
            ], [
                'optician_id' => 1,
                'campaign_id' => 1,
                'event_id' => 3,
                'name' => 'Beispiel 15',
                'created_at' => date('Y-m-d H:i:s', strtotime('2022-05-18 11:43:43')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('2022-05-18 11:43:43')),
            ], [
                'optician_id' => 1,
                'campaign_id' => 1,
                'event_id' => 3,
                'name' => 'umlaut-test',
                'created_at' => date('Y-m-d H:i:s', strtotime('2022-05-19 13:01:34')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('2022-05-19 13:01:34')),
            ], [
                'optician_id' => 1,
                'campaign_id' => 1,
                'event_id' => 3,
                'name' => 'Kuckelsberg Demo',
                'created_at' => date('Y-m-d H:i:s', strtotime('2022-06-03 15:06:49')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('2022-06-03 15:06:49')),
            ],
        ]);
    }
}
