<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  // protected $primaryKey = 'number';
  // public $incrementing = false;
  // protected $keyType = 'string';

  protected $fillable = [
    'name',
    'number',
    'ats',
    'tag',
    'label',
  ];

  // public function calls()
  // {
  //   return $this->hasOne( SipuniCall::class, 'kto_otvetil', 'number' );
  // }
}
