<?php

namespace App\Models;

use App\Models\Siblings;
use App\Models\Personaldata;
use App\Models\FamilyBackground;
use App\Models\EducationalBackground;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentInventory extends Model
{
    use HasFactory;
    protected $table = 'student_inventories';
    protected $guarded = [];
    public function personaldata(){
        return $this->belongsTo(Personaldata::class, 'personal_id');
    }
    public function familybackground(){
        return $this->belongsTo(FamilyBackground::class, 'fambackground_id');
    }
    public function siblings(){
        return $this->belongsTo(Siblings::class, 'siblings_id');
    }
    public function educationalbackground(){
        return $this->belongsTo(EducationalBackground::class, 'educ_id');
    }
}
