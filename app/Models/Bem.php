<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bem extends Model
{
    use HasFactory;

    protected $table = 'bems';

    protected $fillable = [
        'name',
        'no_urut',
        'study_program',
        'visi',
        'misi',
        'photo',
    ];
}
