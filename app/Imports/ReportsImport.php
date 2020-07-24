<?php

namespace App\Imports;

use App\Report;
use App\User;
use App\Regate;
use App\Serial;
use App\ManualReport;
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

            $a_array = ['a', 'audit'];
            $c_array = ['c', 'controle', 'contrôle', 'check'];

            if(in_array($type, $a_array)) {
                $type = "audit";
            } elseif (in_array($type, $c_array)) {
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

            if( Serial::where('code', $serial)->exists()) {

                $serial = Serial::where('code', $serial)->first();
                if(Regate::where('code', $regate_code)->exists()) {
                    $regate = Regate::where('code', $regate_code)->first();
                } else {
                    $regate = Regate::create([
                        'code' => $regate_code
                    ]);
                }

                if($regate != null) {
                    $regate_id = $regate->id;
                } else {
                    $regate_id = null;
                }

                if( !Report::where('serial_id', $serial->id)->where('report_date', $report_date)->exists() ):

                    Report::create([
                        'serial_id'         => $serial->id,
                        'user_id'           => $user->id,
                        'regate_id'         => $regate_id,
                        'type'              => $type,
                        'report_date'       => $report_date,
                        'crack'             => $crack,
                        'crack_length'      => $crack_length,
                        'observations'      => $observations,
                        'postalcode'        => $regate_cp,
                        'city'              => $regate_city,
                    ]);

                endif;

            } else {
                if ($serial != ''):
                    if (!ManualReport::where('serial', $serial)->exists()):
                    ManualReport::create([
                        'regate'             => $regate_code,
                        'postal_code'       => $regate_cp,
                        'city'              => $regate_city,
                        'serial'            => $serial,
                        'type'              => $type,
                        'report_date'       => date('Y-m-d 00:00:00', (intval(trim($row['date_auditcontrole'])) - 25569) * 86400),
                        'crack'             => $crack,
                        'crack_length'      => $crack_length,
                        'observations'      => $observations,
                        'user_id'           => $user->id,
                    ]);
                    endif;
                endif;
            }
        }
    }

    public function headingRow(): int
    {
        return 2;
    }

}
