<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roti extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'foto',
        'desc',
        'harga',
    ];

    protected $guarded = ['id'];

    public function cart()
    {
        return $this->belongsTo(cart::class);
    }
    protected $table = 
        'roti';
}

