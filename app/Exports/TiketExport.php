<?php

namespace App\Exports;

use App\Models\Tiket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TiketExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tiket::all();
    }

    public function headings(): array
    {
        return [
            'NO',
            'No Antrian',
            'id_user',
            'Jaminan',
            'Poliklinik Yang Dituju',
            'Tanggal Kunjungan',
            'Dokter',
            'Waktu   Kunjungan',
                        
        ];
    }
}
