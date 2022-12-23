<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Validator;

class Account extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    public $timestamps = false;
    
    protected $fillable = [
        'account',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static function validate($data)
    {
        return Validator::make($data, [
            'account' => 'required|min:6',
            'password' => 'bail|required|min:6',
        ]);
    }
}
