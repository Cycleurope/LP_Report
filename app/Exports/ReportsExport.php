<?php

namespace App\Exports;

use App\Report;
use App\Serial;
use App\User;
use App\Regate;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
    }
}
