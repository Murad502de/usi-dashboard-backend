<?php

namespace App\Http\Controllers\Import\Sipuni;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Services\Sipuni\SipuniClient;

use App\Imports\SipuniCallsImport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Storage;

use App\Models\SipuniCall;

class SipuniImportController extends Controller
{
  private $sipuniClient;

  public function __construct()
  {
    $this->sipuniClient = new SipuniClient();
  }

  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request)
  {
    echo 'SipuniImportController<br>'; // DELETE

    SipuniCall::truncate();

    $data = $this->sipuniClient->importCalls(
      [
        'from'  => date('d.m.Y'),
        'to'    => date('d.m.Y'),
      ]
    );

    Storage::put( 'sipuni_calls.csv', $data );

    (new SipuniCallsImport)->import( storage_path( 'app/sipuni_calls.csv' ), null, \Maatwebsite\Excel\Excel::CSV );
  }
}
