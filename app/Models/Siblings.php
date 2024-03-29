<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siblings extends Model
{
    use HasFactory;

    protected $table = 'siblings';

    protected $guarded = [];

    public function studentinventory(){
        return $this->hasMany(StudentInventory::class);
    }
}
