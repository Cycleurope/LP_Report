<?php

use Illuminate\Database\Seeder;
use App\User;
class TestUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin Cycleurope',
            'password' => bcrypt('Cycleurope10*'),
            'email' => 'vincent.lombard@cycleurope.fr',
            'login' => 'cycleurope',
        ]);

        $user->assignRole('admin');

        $user = User::create([
            'name' => 'Utilisateur Test',
            'password' => bcrypt('Cycleurope10'),
            'email' => 'web@cycleurope.fr',
            'login' => '70110000',
        ]);

        $user->assignRole('user');
    }
}
