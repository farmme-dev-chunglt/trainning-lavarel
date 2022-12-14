<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'title',
        'price',
        'discount',
        'imgUrl',
    ];
    protected function discount(): Attribute
    {
        return new Attribute(
            set: fn ($value) => $value * 2,
        );
    }
    use HasFactory;

    public function getDiscounts()
    {
        return $this->discount."%";
    }
}
