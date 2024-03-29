<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Activity;
use App\Models\Feedback;
use App\Models\Readmission;
use App\Models\Announcement;
use App\Models\Questionnaire;
use App\Models\CounselingForm;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAdmin()
    {
        return $this->roles()->where('name', 'admin')->exists();
    }

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 2)->exists();
    }
    public function announcements(){
        return $this->hasMany(Announcement::class);
    }
    public function activities(){
        return $this->hasMany(Activity::class);
    }

    public function counselings(){
        return $this->hasMany(CounselingForm::class);
    }
    public function readmissions(){
        return $this->hasMany(Readmission::class);
    }
    public function transfers(){
        return $this->hasMany(Questionnaire::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name'])
        ->setDescriptionForEvent(fn(string $eventName) => "A user has been {$eventName}")
        ->logOnlyDirty();
    }

}
