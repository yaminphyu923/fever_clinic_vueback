<?php

namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class InPatientsExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Patient::whereNull(['out_patient','out_date','dead','dead_date'])
                        ->select('name','gender','age','dob','nrc','phone','address','nextKin','attendent','occupation','symptoms','travelHistory','remark','date')
                        ->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Gender',
            'Age',
            'Date of Birth',
            'NRC',
            'Phone',
            "Address",
            "Next of Kin",
            "Attendent",
            "Occupation",
            "Symptoms",
            "Travel History",
            "Remark",
            "Date",
        ];
    }
}
