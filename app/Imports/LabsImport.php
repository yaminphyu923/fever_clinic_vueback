<?php

namespace App\Imports;

use App\Models\Lab;
use Maatwebsite\Excel\Concerns\ToModel;

class LabsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Lab([
            'name' => (isset($row[0]))?$row[0]:'-',
            'unit' => (isset($row[1]))?$row[1]:'-',
            'range' => (isset($row[2]))?$row[2]:'-',
            'group_id' => (isset($row[3]))?$row[3]:'-',
            'labcategory_id' => (isset($row[4]))?$row[4]:'-',
        ]);
    }
}
