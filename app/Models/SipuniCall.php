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

  public static function getReceivedOutCallsData($userNumber = null)
  {
    if (!$userNumber) return null;

    $receivedCalls = self::query()
      ->where('tip', 'Исходящий')
      ->where('status', 'Отвечен')
      ->where('otkuda', $userNumber)
      ->get()
      ->toArray();

    $duration = 0;

    for ($i = 0; $i < count($receivedCalls) - 1; $i++) {
      $duration += (int)$receivedCalls[$i]['dlitelnost_razgovora'];
    }

    return [
      'count' => count($receivedCalls),
      'duration' => $duration,
    ];
  }
  public static function getMissedOutCallsData($userNumber = null)
  {
    if (!$userNumber) return null;

    $missedCalls = self::query()
      ->where('tip', 'Исходящий')
      ->where('status', 'Не отвечен')
      ->where('otkuda', $userNumber)
      ->get()
      ->toArray();

    $duration = 0;

    for ($i = 0; $i < count($missedCalls) - 1; $i++) {
      $duration += (int)$missedCalls[$i]['dlitelnost_zvonka'];
    }

    return [
      'count' => count($missedCalls),
      'duration' => $duration,
    ];
  }
  public static function getReceivedInCallsData($userNumber = null)
  {
    if (!$userNumber) return null;

    $receivedCalls = self::query()
      ->where('tip', 'Входящий')
      ->where('kto_razgovarival', 'LIKE', '%' . $userNumber . '%')
      ->get()
      ->toArray();

    $duration = 0;

    for ($i = 0; $i < count($receivedCalls) - 1; $i++) {
      $duration += (int)$receivedCalls[$i]['dlitelnost_razgovora'];
    }

    return [
      'count' => count($receivedCalls),
      'duration' => $duration,
    ];
  }
  public static function getMissedInCallsData($userLabel = null, $userTag = null)
  {
    if (!$userLabel || !$userTag) return null;

    $missedCalls = self::query()
      ->where('tip', 'Входящий')
      ->where('status', 'Не отвечен')
      ->where(
        function ($query) use ($userLabel, $userTag) {
          if ($userLabel) {
            $query->where('metka', 'LIKE', '%' . $userLabel . '%');
          }
          if ($userTag) {
            $query->where('tegi', 'LIKE', '%' . $userTag . '%');
          }
        }
      )
      ->get()
      ->toArray();

    $duration = 0;

    for ($i = 0; $i < count($missedCalls) - 1; $i++) {
      $duration += (int)$missedCalls[$i]['dlitelnost_zvonka'];
    }

    return [
      'count' => count($missedCalls),
      'duration' => $duration,
    ];
  }
}
