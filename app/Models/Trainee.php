<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'id',
        'start_date',
        'end_date',
        'payed',
        'not_payed',


    ];
    protected $primaryKey='id';
    public $incrementing =false;
}
