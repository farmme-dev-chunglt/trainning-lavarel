<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $timestamps = false;
    protected $_fillable = ['name', 'description', 'price', 'discount', 'imgUrl'];

    protected static function _boot()
    {
        parent::boot();

        static::created(function ($obj) {
            $obj->slug = Carbon::now()->day . '000' . $obj->id;
            $obj->save();
        });
    }

    public static function findProductBySlug($slug)
    {
        return Product::where('slug', $slug)->first();
    }
}
