<?php

namespace App\Imports;

use App\Models\Character;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;


class CharacterImport implements WithHeadingRow, ToCollection
{
    /**
    * @param Collection $row
    *
    * @return null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $character = Character::where('name', '=', $row['name'])->first();
            if (!isset($character)) {
                $character = Character::create([
                    'name'     => $row['name'],
                    'photo'    => $row['photo'], 
                ]); 
                $character->save();
            }
        }
    }
}
