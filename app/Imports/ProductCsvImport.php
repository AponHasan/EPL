<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class ProductCsvImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'id'                            =>  $row['id'],
            'product_name'                  =>  $row['product_name'],
        '    product_code'                  =>  $row['product_code'],
            'product_dimension'             =>  $row['product_dimension'],
            'product_dimension_unit'        =>  $row['product_dimension_unit'],
            'product_weight'                =>  $row['product_weight'],
            'product_weight_unit'           =>  $row['product_weight_unit'],
            'product_barcode'               =>  $row['product_barcode'],
            'product_dp_price'              =>  $row['product_dp_price'],
            'product_dealer_commision'      =>  $row['product_dealer_commision'],
            'product_mrp'                   =>  $row['product_mrp'],
            'product_color'                 =>  $row['product_color'],
            'product_description'           =>  $row['product_description'],
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
