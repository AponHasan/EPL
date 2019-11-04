<?php

namespace App\Imports;

use App\Dealer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class DealerCsvImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Dealer([
            'id'  => $row['id'],
            'd_s_name'  => $row['d_s_name'],
            'dlr_spo_id' => $row['dlr_spo_id'],
            'dlr_lm_id'  => $row['dlr_lm_id'],
            'dlr_type_id'    => $row['dlr_type_id'],
            'd_proprietor_name'  => $row['d_proprietor_name'],
            'd_s_code'   => $row['d_s_code'],
            'dlr_code'   => $row['dlr_code'],
            'dlr_op_date'    => $row['dlr_op_date'],
            'dlr_op_month'   => $row['dlr_op_month'],
            'dlr_police_station' => $row['dlr_police_station'],
            'dlr_address'    => $row['dlr_address'],
            'dlr_area_id'    => $row['dlr_area_id'],
            'dlr_mobile_no'  => $row['dlr_mobile_no'],
            'dlr_base'   => $row['dlr_base'],
            'dlr_dsm'    => $row['dlr_dsm'],
            'dlr_zone_id'    => $row['dlr_zone_id'],
            'dlr_remark' => $row['dlr_remark'],
            'dlr_tred_lisence'   => $row['dlr_tred_lisence'],
            'dlr_tin_number' => $row['dlr_tin_number'],
            'dlr_active_status' => $row['dlr_active_status'],
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
