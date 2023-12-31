<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnPaidUser extends Authenticatable
{
    use HasFactory;
    use Notifiable;
protected $guard = 'unPaidUser';
protected $fillable = [
'name', 'email', 'password',
];
protected $hidden = [
'password', 'remember_token',
];
}
