<?php

namespace App\Models;

use App\Models\User;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Readmission extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['student_name', 'course_year'])
        ->setDescriptionForEvent(fn(string $eventName) => "A readmission has been {$eventName}")
        ->logOnlyDirty();
    }
}
