<?php

namespace App\Models;

use App\Models\cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cart extends Model
{
    use HasFactory;
    public function roti()
    {
        return $this->belongsTo(roti::class);
    }
    public function user()
    {
        return $this->belongsTo(user::class);
    }
    protected $table = 
    'cart';
    protected $guarded = ['id'];

}
