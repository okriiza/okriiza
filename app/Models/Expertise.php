<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','slug'
    ];

    protected $hidden =[

    ];

    public function projects(){
        return $this->belongsToMany(Project::class);
    }
}
