<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;

    public function shift():BelongsTo
    {
        return $this->belongsTo(Shift::class,'shift_id','id');
    }

    public function employee():BelongsTo
    {
        return $this->belongsTo(Employee::class,'employee_id','id');
    }
}
