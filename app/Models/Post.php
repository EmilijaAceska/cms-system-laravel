<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable=[
        'user_id',
        'category_id',
        'photo_id',
        'title',
        'body',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function photo(){
        return $this->belongsTo('App\Models\Photo');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function comments(){
        return$this->hasMany('App\Models\Comment');
    }

//    public function photoPlaceholder(){
//        return 'http://placehold.it/200x700';
//    }

}
