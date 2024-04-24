<?php


    namespace App\Imports;
    use Illuminate\Contracts\Queue\ShouldQueue;

    class ImportStudents implements ShouldQueue {
        public static function import($collection){
            dd($collection);
        }
    }
