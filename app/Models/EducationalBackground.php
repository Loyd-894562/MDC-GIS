<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalBackground extends Model
{
    use HasFactory;

    protected $table = 'educational_backgrounds';

    protected $guarded = [];
    public function studentinventory(){
        return $this->hasMany(StudentInventory::class);
    }
}
