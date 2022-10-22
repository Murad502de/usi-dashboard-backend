<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SipuniCall;
use App\Models\User;

class SipuniCallsController extends Controller
{
    private $users;

    public function __construct()
    {
        $this->users = User::all();
    }

    public function users()
    {
        $calls = [];

        foreach ($this->users as $user) {
            $calls[] = [
                'user'     => $user->toArray(),
                'outgoing' => [
                    'received' => SipuniCall::getReceivedOutCallsData($user->number),
                    'missed'   => SipuniCall::getMissedOutCallsData($user->number),
                ],
                'incoming' => [
                    'received' => SipuniCall::getReceivedInCallsData($user->number),
                    'missed'   => SipuniCall::getMissedInCallsData($user->label, $user->tag),
                ],
            ];
        }

        return response(['status' => 'OK', 'data' => $calls], 200);
    }

    public function usersCalls()
    {
        return 'usersCalls';
    }

    public function usersId($id)
    {
        return 'usersId: ' . $id;
    }

    public function usersIdCalls($id)
    {
        return 'usersIdCalls: ' . $id;
    }
}
