<?php

namespace Database\Seeders;

use App\Models\Optician;
use Illuminate\Database\Seeder;

class OpticianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $opticians = Optician::create([
            'name' => 'Brillen Guru',
            'street' => 'Mühlenstr. 23',
            'zip' => '25462',
            'city' => 'Relllingen',
            'url_homepage' => 'https://web.brillen-guru.de/',
            'url_imprint' => 'https://web.brillen-guru.de/impressum/',
            'url_privacy' => 'https://web.brillen-guru.de/datenschutzerklaerung/',
            'url_contact' => 'https://web.brillen-guru.de/kontakt/',
            'url_appointment' => 'https://marketing.brillen-guru.de/s/brillen-guru/termin-sehtestkampagne',
        ]);
    }
}
