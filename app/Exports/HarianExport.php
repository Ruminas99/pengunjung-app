<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class HarianExport implements FromCollection
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data->map(function ($item) {
            return [
                'Nama' => $item['nama'],
                'Jenis' => $item['jenis'],
                'Keterangan' => $item['keterangan'],
                'Waktu' => \Carbon\Carbon::parse($item['waktu'])->format('d-m-Y H:i'),
            ];
        });
    }
}
