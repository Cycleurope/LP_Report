<?php

namespace App\Exports;

use App\Report;
use App\Serial;
use App\User;
use App\Regate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ReportsExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Report::all();
    }

    public function map($report): array
    {
        return [
            $report->serial->code,
            $report->serial->product->code,
            substr($report->serial->manufactured_at, 8, 2)."/".substr($report->serial->manufactured_at, 5, 2)."/".substr($report->serial->manufactured_at, 0, 4),
            $report->regate->code,
            $report->regate->name,
            $report->simpleFriendlyType(),
            $report->simpleCrackStatus(),
            $report->crack_length,
            $report->observations,
            $report->user->login,
            $report->user->name,
            $report->user->postalcode,
            $report->user->city,
            substr($report->created_at, 8, 2)."/".substr($report->created_at, 5, 2)."/".substr($report->created_at, 0, 4),
            '',
            '',
        ];
    }

    public function headings(): array
    {
        return [
            'Numéro de série',
            'Code Article',
            'Date Fabrication',
            'Code REGATE',
            'Libellé',
            'Audit / Contrôle',
            'Micro-Fissure',
            'Longueur',
            'Observations',
            'Rempli par',
            '',
            'CP',
            'Ville',
            'Date de déclaration',
            'Cadre à remplacer',
            'Nouveau numéro de série',
        ];
    }
}
