<?php

namespace App\Models;

use App\Models\Position;
use App\Models\Transaction;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
