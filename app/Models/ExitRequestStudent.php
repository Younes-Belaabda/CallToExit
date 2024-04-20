<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExitRequestStudent extends Model
{
    use HasFactory;

    protected $fillable = ['exit_request_id' , 'user_id'];
}
