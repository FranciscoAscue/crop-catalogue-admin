<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CloneCharacteristic;

class Clon extends Model
{
    use HasFactory;
    protected $table = 'clones';

    public function cloneCharacteristics() 
    {
        return $this->hasMany(CloneCharacteristic::class, 'clone_id' )->get();
    }



}


