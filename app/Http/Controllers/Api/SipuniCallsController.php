<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Models\SipuniCall;
use App\Models\User;
use App\Http\Controllers\Controller;

class SipuniCallsController extends Controller
{
  private $users;

  public function __construct()
  {
    $this->users = User::all();
  }

  public function users ()
  {
    $calls = [];

    foreach ( $this->users as $user )
    {
      // echo "user number: " . ( int )$user->number . '<br>'; // DELETE

      // $incomingReceivedCalls = SipuniCall::query()
      //   ->where( 'tip', 'Исходящий' )
      //   ->where( 'status', 'Отвечен' )
      //   ->where( 'otkuda', $user->number )
      //   ->get();

      // echo "count: " . count( $incomingReceivedCalls->toArray() ) . '<br><br>'; // DELETE

      // foreach ( $incomingReceivedCalls as $call )
      // {
      //   echo '<pre>';
      //   print_r( $call->toArray() );
      //   echo '</pre>';
      // }

      $calls[] = [
        'user' => $user->toArray(),

        'outgoing' => [
          'received' => count(
            SipuniCall::query()
              ->where( 'tip', 'Исходящий' )
              ->where( 'status', 'Отвечен' )
              ->where( 'otkuda', $user->number )
              ->get()
              ->toArray()
          ),

          'missed' => count(
            SipuniCall::query()
              ->where( 'tip', 'Исходящий' )
              ->where( 'status', 'Не отвечен' )
              ->where( 'otkuda', $user->number )
              ->get()
              ->toArray()
          ),
        ],

        'incoming' => [
          'received' => count(
            SipuniCall::query()
              ->where( 'tip', 'Входящий' )
              ->where( 'kto_razgovarival', 'LIKE', '%' . $user[ 'number' ] . '%' )
              ->get()
              ->toArray()
          ),

          'missed' => count(
            SipuniCall::query()
              ->where( 'tip', 'Входящий' )
              ->where( 'status', 'Не отвечен' )
              ->where(
                function ( $query ) use ( $user )
                {
                  if ( $user->label )
                  {
                    $query->where( 'metka', 'LIKE', '%' . $user->label . '%' );
                  }

                  if ( $user->tag )
                  {
                    $query->where( 'tegi', 'LIKE', '%' . $user->tag . '%' );
                  }
                }
              )
              ->get()
              ->toArray()
          ),
        ],
      ];
    }

    return response( [ 'status' => 'OK', 'data' => $calls ], 200 );
  }

  public function usersCalls ()
  {
    return 'usersCalls';
  }

  public function usersId ( $id )
  {
    return 'usersId: ' . $id;
  }

  public function usersIdCalls ( $id )
  {
    return 'usersIdCalls: ' . $id;
  }
}
