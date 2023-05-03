<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saran extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'email',
        'saran',
    ];

    protected $guarded = ['id'];

    protected $table = 
    'saran';

}
