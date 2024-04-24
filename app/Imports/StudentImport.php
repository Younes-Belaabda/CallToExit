<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class StudentImport implements ToModel , WithHeadingRow
{
    public function model(array $row)
    {
        return new User([
            'name' => Session::get('rows')['name'],
            'eID' => Session::get('rows')['eID'],
            'grade_id' => Session::get('rows')['grade_id'],
        ]);
    }
}
