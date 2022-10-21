<?php

namespace App\Models;

use App\Models\User;
use App\Models\Promo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PromoUser extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function promo()
    {
        return $this->belongsTo(Promo::class);
    }
}
