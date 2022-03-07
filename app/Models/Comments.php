<?php

 

namespace App\Models;

 

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

 

class Comments extends Model

{

    protected $table = 'comments';

   protected $fillable = ['content', 'blog_post_id'];

 

    use HasFactory;
    use SoftDeletes;

 

    public function post()

    {

        return $this->belongsTo(BlogPost::class);

    }

}