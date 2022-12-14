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
    use HasFactory;

    public function getDiscounts()
    {
        return $this->discount."%";
    }
}
