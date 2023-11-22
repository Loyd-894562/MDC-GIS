<?php

namespace App\Models;

use App\Models\User;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Adminactivity extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = [];

    protected $table = 'activities';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['title'])
        ->setDescriptionForEvent(fn(string $eventName) => "An activity has been {$eventName}")
        ->logOnlyDirty();
    }
}
