<?php

namespace App\Imports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\ToModel;

class PatientsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Patient([
            'name' => (isset($row[0]))?$row[0]:'-',
            'gender' => (isset($row[1]))?$row[1]:'-',
            'age' => (isset($row[2]))?$row[2]:'-',
            'dob' => (isset($row[3]))?$row[3]:'-',
            'nrc' => (isset($row[4]))?$row[4]:'-',
            'phone' => (isset($row[5]))?$row[5]:'-',
            'address' => (isset($row[6]))?$row[6]:'-',
            'nextKin' => (isset($row[7]))?$row[7]:'-',
            'attendent' => (isset($row[8]))?$row[8]:'-',
            'occupation' => (isset($row[9]))?$row[9]:'-',
            'symptoms' => (isset($row[10]))?$row[10]:'-',
            'travelHistory' => (isset($row[11]))?$row[11]:'-',
            'remark' => (isset($row[12]))?$row[12]:'-',
            'date' => (isset($row[13]))?$row[13]:'-',
        ]);
    }
}
