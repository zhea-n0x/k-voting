<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dlm extends Model
{
    use HasFactory;

    protected $table = 'dlms';

    protected $fillable = [
        'name',
        'no_urut',
        'study_program',
        'visi',
        'misi',
        'photo',
    ];

}
