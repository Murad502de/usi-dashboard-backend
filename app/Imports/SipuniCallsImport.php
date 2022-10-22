<?php

namespace App\Imports;

use App\Models\SipuniCall;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SipuniCallsImport implements ToCollection, WithHeadingRow
{
    use Importable;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // echo '<pre>';
            // print_r($row->toArray());
            // echo '</pre>';

            SipuniCall::create(array_merge($row->toArray(), [
                'kto_razgovarival' => join(
                    " ",
                    array_filter(
                        explode(" ", $row->toArray()['kto_razgovarival']),
                        function ($index) {
                            return $index % 2 === 0;
                        },
                        ARRAY_FILTER_USE_KEY
                    )
                ),
            ]));
        }
    }
}
