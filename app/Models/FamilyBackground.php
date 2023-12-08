<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyBackground extends Model
{
    use HasFactory;

    protected $table = 'family_backgrounds';

    protected $guarded = [];
    public function studentinventory(){
        return $this->hasMany(StudentInventory::class);
    }
}
