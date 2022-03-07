<?php

 

namespace App\Models;

 

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

 

class BlogPost extends Model

{

    use SoftDeletes;

    protected $fillable = ['Nama', 'Pekerjaan','user_id'];

    use HasFactory;

 

    public function comments()

    {

        return $this->hasMany('App\Models\Comments');

    }

 

    public function user()

    {

        return $this->belongsTo('App\Models\User');

    }

 

    protected static function booted()

    {

        static::deleting(function (BlogPost $post){

            $post->comments()->delete();

        });

 

        static::restoring(function (BlogPost $post){

            $post->comments()->restore();

        });

    }

}