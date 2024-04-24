<?php

namespace App\Imports;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

// ShouldQueue
class fathersImport implements ToModel , WithHeadingRow , WithChunkReading , ShouldQueue
{
   public function model(array $row)
    {
        $indexs = Session::get('rows');

        $user = new User([
            'eID' => $row[$indexs['eID']],
            'name' => $row[$indexs['name']],
            'email' => 'e-' . $row[$indexs['eID']] . '@mail.com',
            'password' => bcrypt(00110011),
            // 'grade_id' => $row[$indexs['grade_id']]
        ]);

        $user->assignRole('father');
        return $user;
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
