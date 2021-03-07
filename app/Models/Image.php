<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id','image'
    ];

    protected $hidden =[

    ];

    public function article(){
        return $this->belongsTo(Article::class, 'article_id','id');
    }
}
