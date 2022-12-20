<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\IdGenerator;
use Carbon\Carbon;
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
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
}
