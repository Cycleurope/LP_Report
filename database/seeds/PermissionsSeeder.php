<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'admin',
            'guard_name' => 'web',
        ]);
        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'user',
            'guard_name' => 'web',
        ]);
    }
}
