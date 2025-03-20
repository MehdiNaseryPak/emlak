<?php

namespace Modules\Category\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Modules\Category\Database\Factories\CategoryFactory;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name','prent_id','status'];

    public function parent()
    {
        return $this->hasOne(Category::class,'id','prent_id');
    }
    // protected static function newFactory(): CategoryFactory
    // {
    //     // return CategoryFactory::new();
    // }
}
