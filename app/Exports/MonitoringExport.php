<?php

namespace App\Exports;

use App\Models\Monitoring;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MonitoringExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Monitoring::select(
            'cel1',
            'cel2',
            'cel3',
            'cel4',
            'total',
            'current',
            'soc',
            'resistance',
            'temperature',
            'fuzzy',
            'created_at'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Cell 1',
            'Cell 2',
            'Cell 3',
            'Cell 4',
            'Total Voltage',
            'Current',
            'State of Charge (SOC)',
            'Resistance',
            'Temperature',
            'Fuzzy Logic Output',
            'Waktu'
        ];
    }
}
