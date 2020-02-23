<?php

namespace App\Exports;

use App\BrasilRegistration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class BrasilRegExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return BrasilRegistration::all();
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

    public function headings(): array

    {
        return [
            '#',
            'Nomes',
            'Sobrenomes',
            'Edade',
            'E-mail',
            'Gênero',
            'Calçados',
            'Equipe',
            'Distância',
            'Melhor hora',
            'Notícias por e-mail',
        ];
    }
}
