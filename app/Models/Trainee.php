<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'program',
        'updater',


    ];
    protected $primaryKey='id';
    public $incrementing =false;
    public function subscription(): HasMany
    {
        return $this->hasMany(subscription::class)->where('deleted','=','0');
    }
    public function payements(): HasMany
    {
        return $this->hasMany(revenue::class)->where('deleted','=','0');
    }
}
