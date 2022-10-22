<?php

namespace App\Http\Controllers;

use App\Imports\SipuniUsersImport;
use App\Services\Sipuni\SipuniClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SipuniImportUsersController extends Controller
{
    private $sipuniClient;

    public function __construct()
    {
        $this->sipuniClient = new SipuniClient();
    }

    public function __invoke(Request $request)
    {
        echo 'SipuniImportUsersController __invoke';

        $data = $this->sipuniClient->importUsers();

        Storage::put('sipuni_operators.csv', $data);

        (new SipuniUsersImport)->import(
            storage_path('app/sipuni_operators.csv'),
            null,
            \Maatwebsite\Excel\Excel::CSV
        );
    }
}
