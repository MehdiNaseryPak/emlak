<?php

namespace Modules\Ads\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Category\Models\Category;
use Modules\User\Models\User;

// use Modules\Ads\Database\Factories\AdsFactory;

class Ads extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'summary',
        'description',
        'address',
        'amount',
        'image',
        'background',
        'floor',
        'year',
        'storeroom',
        'balcony',
        'area',
        'toilet',
        'parking',
        'tag',
        'type',
        'status',
        'sell_status',
        'cat_id',
        'user_id',
        'show_in_slider',
        'view'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id');
    }
}
