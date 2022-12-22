<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'price', 'discount', 'imgUrl'];

    protected static function boot()
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

    public static function findTrashedBySlug($slug)
    {
        return Product::withTrashed()->where('slug', $slug);

    }

    public static function validate($data)
    {
        return Validator::make($data, [
            'name' => 'bail|required',
            'description' => 'bail|required|max:500',
            'price' => 'bail|required|numeric',
            'discount' => 'bail|required|numeric',
            'imgUrl' => 'bail|required',
        ]);
    }
}
