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
            'name' => 'bail|required|string|min:6|max:100',
            'description' => 'bail|required|string|min:6|max:512',
            'price' => 'bail|required|numeric|min:0',
            'discount' => 'bail|nullable|numeric|min:0|max:100',
            'imgUrl' => 'bail|required',
        ]);
    }
}
