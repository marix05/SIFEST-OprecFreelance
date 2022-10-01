<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'NIM',
        'email',
        'line',
        'class',
        'password',
        'domicile',
        'first_choice',
        'first_reason',
        'second_choice',
        'second_reason',
        'interview',
        'identifier',
        'result',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function checkData($NIM) {
        if (User::where('NIM', '=', $NIM)->exists()) {
            return true;
        } return false;
    }
    
    public static function getData($NIM) {
        if (User::where('NIM', '=', $NIM)->exists()) {
            return User::where('NIM',"=", $NIM)->first();
        } return "";
    }
}