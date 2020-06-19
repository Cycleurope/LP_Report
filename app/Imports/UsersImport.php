<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\User;
class UsersImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        
        foreach($collection as $row) {

            $name           = trim($row['name']);
            $login          = trim($row['login']);
            $email          = trim($row['email']);
            $postal         = substr(trim($row['city']), 0, 5);
            $city           = trim($row['city']);
            $password       = trim($row['password']);

            if( !User::where('login', $login)->exists() ) {

                $user = User::create([
                    'name'              => $name,
                    'login'             => $login,
                    'email'             => $email,
                    'address1'          => '',
                    'address2'          => '',
                    'postal_code'       => $postal,
                    'city'              => $city,
                    'password'          => bcrypt($password)
                ]);

                $user->assignRole('user');

            }
        }
    }

    public function headingRow(): int
    {
        return 1;
    }
}
