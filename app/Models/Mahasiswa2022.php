<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa2022 extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'NIM',
        'name',
    ];

    public static function validateNIM($NIM) {
        if (Mahasiswa2022::where('NIM', '=', $NIM)->exists()) {
            return true;
        } return false;
    }
}
