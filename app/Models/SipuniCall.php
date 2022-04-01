<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SipuniCall extends Model
{
  use HasFactory;

  protected $table = 'sipunicalls';
  protected $fillable = [
    'tip',
    'status',
    'vremya',
    'sxema',
    'otkuda',
    'kuda',
    'kto_otvetil',
    'kto_razgovarival',
    'dlitelnost_zvonka',
    'dlitelnost_razgovora',
    'vremya_otveta',
    'ocenka',
    'id_zapisi',
    'metka',
    'tegi',
    'id_zakaza_zvonka',
    'zapis_sushhestvuet',
    'novyi_klient',
    'sostoyanie_perezvona',
    'vremya_perezvona',
    'informaciya_iz_crm',
    'otvetstvennyi_iz_crm',
  ];

  // public function user ()
  // {
  //   return $this->belongsTo( User::class, 'kto_otvetil', 'number' );
  // }
}
