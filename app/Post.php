<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;
    protected $dates = ['published_at'];

    protected $fillable = [

    'title',
    'description',
    'content',
    'category_id',
    'image',
    'published_at',
    'user_id'

];

    public function category(){

        return $this->belongsTo(Category::class);
    }


    public function tags(){

        return $this->belongsToMany(Tag::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }


//    public function hasTags($tagId){
//
//       return in_array($tagId, $this->tags->pluck('id')->toArray()) ;
//
//    }

}
