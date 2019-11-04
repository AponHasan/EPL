<?php

namespace App\Imports;

use App\Factory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class FactoryCsvImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Factory([
            'id'      => $row['id'],
            'factory_name'      => $row['factory_name'],
            'factory_company_id'        => $row['factory_company_id'],
            'factory_type_id'       => $row['factory_type_id'],
            'factory_division_id'       => $row['factory_division_id'],
            'factory_contact_number'        => $row['factory_contact_number'],
            'factory_address'       => $row['factory_address'],
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }
    
    public function chunkSize(): int
    {
        return 1000;
    }
}
