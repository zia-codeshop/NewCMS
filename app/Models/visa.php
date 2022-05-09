<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visa extends Model
{
    use HasFactory;

    public function getAgent(){
        return $this->hasOne(Agent::class, 'id','seller_id');
    }
}
