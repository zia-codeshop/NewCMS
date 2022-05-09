<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cdr extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [];

    public function cdr_release(){
        return $this->hasOne(ReleaseCdr::class,'cdr_id');
    }


}
