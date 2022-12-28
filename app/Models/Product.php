<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Validator;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Sluggable;
    use SluggableScopeHelpers;

    public $timestamps = false;
    protected $fillable = ['name', 'description', 'price', 'discount', 'imgUrl'];

    public static function findTrashedBySlug($slug)
    {
        return Product::withTrashed()->whereSlug($slug);
    }
        public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
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
