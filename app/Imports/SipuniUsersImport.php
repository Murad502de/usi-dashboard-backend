<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SipuniUsersImport implements ToCollection, WithHeadingRow
{
    use Importable;

    public function collection(Collection $rows)
    {
        User::truncate();

        foreach ($rows as $row) {
            // echo '<pre>';
            // print_r($row->toArray());
            // echo '</pre><br>';

            $explodedName = explode(' ', $row['name']);
            $name         = '';

            for ($i = 2; $i < count($explodedName); $i++) {
                $name .= $explodedName[$i] . ' ';
            }

            // echo '<pre>'; print_r($explodedName); echo '</pre><br>';

            User::create(array_merge($row->toArray(), [
                'name'       => $name,
                'number'     => $row['login'],
                'department' => mb_strtolower($explodedName[0]) !== 'пусто' ? mb_strtolower($explodedName[0]) : null,
                'position'   => mb_strtolower($explodedName[1]) !== 'пусто' ? mb_strtolower($explodedName[1]) : null,
                // 'department' => User::getDepartment($explodedName[0])
            ]));
        }
    }
}
