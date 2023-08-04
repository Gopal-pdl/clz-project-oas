<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rand_id',
        'fiscal_year_id',
        'year_id',
        'semester_id',
        'organization_id'
    ];


    public function fiscalYear():HasOne
    {
      return  $this->hasOne(FiscalYear::class,'id', 'fiscal_year_id');
    }

}
