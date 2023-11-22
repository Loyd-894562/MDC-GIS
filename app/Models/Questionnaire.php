<?php

namespace App\Models;

use App\Models\User;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Questionnaire extends Model
{
    use HasFactory, LogsActivity;


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['academic_year', 'feeling'])
        ->setDescriptionForEvent(fn(string $eventName) => "A questionnaire has been {$eventName}")
        ->logOnlyDirty();
    }

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
