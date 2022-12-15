<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'account',
        'password',
    ];
    use HasFactory;
}
