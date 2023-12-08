<?php

namespace App\Models;

use App\Models\StudentInventory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personaldata extends Model
{
    use HasFactory;

    protected $table = 'personal_datas';

    protected $guarded = [];

    public function studentinventory(){
        return $this->hasMany(StudentInventory::class);
    }
}
