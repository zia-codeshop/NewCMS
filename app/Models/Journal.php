<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Journal extends Model
{
    use HasFactory,SoftDeletes;
    public function getProject(){
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
    public function getPeople(){
        return $this->hasOne(People::class, 'id', 'people_id');
    }
}
