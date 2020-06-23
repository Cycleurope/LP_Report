<?php

namespace App\Imports;

use App\Report;
use App\User;
use App\Regate;
use App\Serial;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Auth;
class ReportsImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $collection)
    {
        $user = Auth::user();
        foreach($collection as $row)
        {
            $regate_cp              = trim($row['code_postal_bureau']);
            $regate_city            = trim($row['ville_bureau']);
            $regate_code            = trim($row['regate_etablissement']);
            $serial                 = trim($row['nchassis']);
            $type                   = strtolower(trim($row['audit_controle']));
            if($type == "a") {
                $type = "audit";
            } elseif ($type == "c") {
                $type = "checkup";
            }
            $report_date            = date('Y-m-d 00:00:00', (intval(trim($row['date_auditcontrole'])) - 25569) * 86400);
            $crack                  = trim(strtolower($row['fissure_on_voir_fiche_atelier_38']));
            if(in_array($crack, ['n', 'non', 'no', 0, '', "N", "Non", "NON", "nOn", "nON", "NO"], true)) {
                $crack = 0;
            } else $crack = 1;
            $crack_length           = trim($row['longueur_mm']);
            $crack_length           = intval($crack_length);
            $observations           = trim($row['observations']);

            if( Serial::where('code', $serial)->exists() && Regate::where('code', $regate_code)->exists()) {

                $serial = Serial::where('code', $serial)->first();
                $regate = Regate::where('code', $regate_code)->first();

                if( !Report::where('serial_id', $serial->id)->where('report_date', $report_date)->exists() ):

                Report::create([
                    'serial_id'         => $serial->id,
                    'user_id'           => $user->id,
                    'regate_id'         => $regate->id,
                    'type'              => $type,
                    'report_date'       => $report_date,
                    'crack'             => $crack,
                    'crack_length'      => $crack_length,
                    'observations'      => $observations,
                    'postalcode'        => $regate_cp,
                    'city'              => $regate_city
                ]);

                endif;

            }
        }
    }

    public function headingRow(): int
    {
        return 2;
    }

}
