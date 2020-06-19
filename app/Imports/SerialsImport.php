<?php

namespace App\Imports;

use App\Serial;
use App\Regate;
use App\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SerialsImport implements ToCollection
{

    public function collection(Collection $collection)
    {
        //dd($collection);
        foreach($collection as $row) {

            $regate_code        = trim($row[0]);
            $regate_name        = trim($row[1]);
            $regate_addr1       = trim($row[2]);
            $regate_addr2       = trim($row[3]);
            $regate_postal      = substr(trim($row[4]), 0, 5);
            $regate_city        = $row[4];
            $cei_order          = trim($row[6]);
            $poste_order        = trim($row[7]);
            $m_at               = trim($row[8]);
            $m_at_formatted     = substr($m_at, 0, 4)."-".substr($m_at, 4, 2)."-".substr($m_at, 6, 2)." 00:00:00";
            $product_code       = trim($row[9]);
            $serial_code        = trim($row[10]);
            //dd($regate_city);

            if(!Regate::where('code', $regate_code)->exists()) {
                $regate = Regate::create([
                    'code'              => $regate_code,
                    'name'              => $regate_name,
                    'address1'          => $regate_addr1,
                    'address2'          => $regate_addr2,
                    'postal_code'       => $regate_postal,
                    'city'              => $regate_city
                ]);
            } else {
                $regate = Regate::where('code', $regate_code)->first();
            }

            if(!Product::where('code',$product_code)->exists()) {
                $product = Product::create([
                    'code' => $product_code
                ]);
            } else {
                $product = Product::where('code', $product_code)->first();
            }

            if(!Serial::where('code', $serial_code)->exists()) {
                Serial::create([
                    'code'              => $serial_code,
                    'product_id'        => $product->id,
                    'manufactured_at'   => $m_at_formatted,
                    'cei_order'         => $cei_order,
                    'poste_order'       => $poste_order,
                    'regate_id'         => $regate->id
                ]);
            }

        }
    }

}
