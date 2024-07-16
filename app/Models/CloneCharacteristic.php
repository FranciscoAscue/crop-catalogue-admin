<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CloneCharacteristic extends Model
{
    use HasFactory;


    public function clon()
    {
        return $this->belongsTo(Clon::class);
    }
}
