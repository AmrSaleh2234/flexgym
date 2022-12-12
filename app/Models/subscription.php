<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Mpdf\Tag\U;

class subscription extends Model
{
    use HasFactory;
    protected $fillable=['trainee_id','trainer_id','start_date','end_date','program','trainer_id','deleted'];
    public function trainee(): BelongsTo
    {
        return $this->belongsTo(Trainee::class);
    }
    public function trainer(): BelongsTo
    {
        return $this->belongsTo(User::class,'trainer_id');
    }
}
