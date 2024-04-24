<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\StudentFather;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Session;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ImportStudentsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 0;
    private $collection;
    private $rows;
    /**
     * Create a new job instance.
     */
    public function __construct($collection , $rows)
    {
        $this->collection = $collection;
        $this->rows = $rows;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $students = User::role('student')->get();
        foreach($students as $student){
            $father = User::role('father')->where('phone' , $student->phone)->first();
            if($father != null){
                StudentFather::create([
                    'father_id' => $father->id,
                    'student_id' => $student->id,
                ]);
            }
        }
        // foreach($this->collection as $row){
        //     $user = User::create([
        //         'eID'      => $row['Identity'],
        //         'name'     => $row['Name'],
        //         // 'grade_id'     => $row['Grade'],
        //         'phone'     => '966' . $row['Phone'],
        //         'email'    => 'e-' . $row['Identity'] . time() . 'x@mail.com',
        //         'password' => bcrypt(00110011),
        //     ]);
        //     $user->assignRole('father');
        // }

    }
}
