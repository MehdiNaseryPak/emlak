<?php

namespace Modules\Post\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Category\Models\Category;
use Modules\User\Models\User;

// use Modules\Post\Database\Factories\PostFactory;

class Post extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title','body','image','user_id','cat_id','published_at','status'];

    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    // protected static function newFactory(): PostFactory
    // {
    //     // return PostFactory::new();
    // }
}
