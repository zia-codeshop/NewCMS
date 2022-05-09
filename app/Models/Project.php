<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes ;

    protected $fillable = [];

    public function journal(){
        return $this->hasMany(Journal::class,'project_id');
    }

    public function getCdr(){
        return $this->hasMany(Cdr::class,'project_id');
    }
}
