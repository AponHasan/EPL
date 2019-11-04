<?php

namespace App\Imports;

use App\DealerLineManager;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class LineManagerCsvImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DealerLineManager([
            'id'   =>  $row['id'],
            'lm_name'   =>  $row['lm_name'],
            'lm_nid'    =>  $row['lm_nid'],
            'lm_phone_number'   =>  $row['lm_phone_number'],
            'lm_address'    =>  $row['lm_address']
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
