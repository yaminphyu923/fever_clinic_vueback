<?php

namespace App\Exports;

use App\Models\Lab;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LabsExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lab::select('name','unit','range','group_id','labcategory_id')->get();
    }

    public function headings(): array
    {
        return [
            'Lab Name',
            'Unit',
            'Normal Range',
            'Group',
            'Category',
        ];
    }
}
