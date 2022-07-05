<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class CustomersExport implements FromCollection, WithCustomCsvSettings, WithHeadings
{
    public function getCsvSettings(): array
    {
        return [
           
        ];
    }

    public function headings(): array
    {
        return [
            "id",
             "slug",
              "customer_list_id",
              "title",
              "firstName",
              "lastName",
              "street",
              "postal",
              "city",
              "country",
              "firm"];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Customer::ExportCsv());
    }
} 