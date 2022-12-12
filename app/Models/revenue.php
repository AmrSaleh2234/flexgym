<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class revenue extends Model
{
    use HasFactory;
    protected $fillable=['trainee_id','trainer_id','amount','deleted'];
    public function trainee(): BelongsTo
    {
        return $this->belongsTo(Trainee::class);
    }
    public function trainer(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
