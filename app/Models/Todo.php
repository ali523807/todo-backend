<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Todo extends Model
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $fillable = ['title'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
