<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'alamat',
        'no',
        'item',
        'tanggal',
        'pembayaran',
        'user_id',
        'status',
    ];
    protected $guarded = ['id'];
    protected $table = 
    'order';

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
