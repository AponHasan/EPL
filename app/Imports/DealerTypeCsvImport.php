<?php

namespace App\Imports;

use App\DealerType;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
class DealerTypeCsvImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
         
        return new DealerType([
            'id'    =>  $row['id'],
            'type_title'    =>  $row['title'],
            'type_description'  =>  $row['description'],
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
