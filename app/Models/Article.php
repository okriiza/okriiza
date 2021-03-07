<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','title','slug','body','thumbnail','keyword'
    ];

    protected $hidden =[

    ];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    // public function image(){
    //     return $this->hasMany(Image::class, 'article_id','id');
    // }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
