<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'student_id',
        'phone_no',
        'Address',
        'organization_id',
    ];
}
