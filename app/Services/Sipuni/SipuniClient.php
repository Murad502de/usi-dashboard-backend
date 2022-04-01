<?php

namespace App\Services\Sipuni;

class SipuniClient
{
  public function __construct()
  {
    echo 'SipuniClient<br>'; // DELETE
  }

  /**
   * @param array $payload
   * [
   *    @param string $from
   *    @param string $to
   * ]
   */
  public function importCalls($payload = [])
  {
    echo 'importCalls<br>'; // DELETE

    $user       = '043705';
    $from       = $payload['from'];
    $to         = $payload['to'];
    $type       = '0';
    $state      = '0';
    $tree       = '';
    $fromNumber = '';
    $toNumber   = '';
    $toAnswer   = '';
    $numbersInvolved = '1';
    $names = '';
    $anonymous  = '1';
    $firstTime  = '0';
    $secret     = '0.37akhdpcopl';

    $hashString = join('+', array($anonymous, $firstTime, $from, $fromNumber, $names, $numbersInvolved, $state, $to, $toAnswer, $toNumber, $tree, $type, $user, $secret));
    $hash       = md5($hashString);

    $url    = 'https://sipuni.com/api/statistic/export';
    $query  = http_build_query(array(
      'anonymous'   => $anonymous,
      'firstTime'   => $firstTime,
      'from'        => $from,
      'fromNumber'  => $fromNumber,
      'names' => $names,
      'numbersInvolved' => $numbersInvolved,
      'state'       => $state,
      'to'          => $to,
      'toAnswer'    => $toAnswer,
      'toNumber'    => $toNumber,
      'tree'        => $tree,
      'type'        => $type,
      'user'        => $user,
      'hash'        => $hash,
    ));

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);

    return $output;
  }
}
