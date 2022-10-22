<?php

namespace App\Models;

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

    private const KRD            = 'крд';
    private const STV            = 'ств';
    private const RND            = 'рнд';
    private const KRD_DEPARTMENT = 'krd';
    private const STV_DEPARTMENT = 'stv';
    private const RND_DEPARTMENT = 'rnd';

    protected $fillable = [
        'name',
        'number',
        'department',
        'ats',
        'tag',
        'label',
    ];

    public static function getDepartment(string $value): string
    {
        echo "<br>"; echo mb_strtolower($value); echo "<br>";

        switch (mb_strtolower($value)) {
            case self::KRD:
                return self::KRD_DEPARTMENT;

            case self::STV:
                return self::STV_DEPARTMENT;

            case self::RND:
                return self::RND_DEPARTMENT;

            default:
                return '';
        }
    }

    // public function calls()
    // {
    //   return $this->hasOne( SipuniCall::class, 'kto_otvetil', 'number' );
    // }
}
