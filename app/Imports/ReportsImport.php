<?php

namespace App\Imports;

use App\Report;
use App\User;
use App\Regate;
use App\Serial;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ReportsImport implements ToCollection
{


    public function collection(Collection $collection)
    {
        foreach($collection as $row)
        {
            
        }
    }

}
