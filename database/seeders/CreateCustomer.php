<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CreateCustomer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->importCsv();
    }
    public function importCsv()
    {
        $file = public_path('data.csv');

        $customerArr = $this->csvToArray($file);

        for ($i = 0; $i < count($customerArr); $i ++)
        {

            $customer = Customer::create([
                'slug' =>$customerArr[$i]['slug'],
                'firstName' => $customerArr[$i]['firstName'],
                'lastName' => $customerArr[$i]['lastName'],
                'title' => $customerArr[$i]['title'],
                'street' => $customerArr[$i]['street'],
                'postal' => $customerArr[$i]['postal'],
                'city' => $customerArr[$i]['city'],
                'country' => $customerArr[$i]['country'],
                'firm' => $customerArr[$i]['firm'],
                'customer_list_id' => $customerArr[$i]['customer_list_id'],
            ]);
        }

    }

    function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }



}
