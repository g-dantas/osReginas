<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id_tp_usuario' => 1,
            'id_departamento' => 1,
            'name' => 'Gabriel Dantas',
            'login' => 'gdantas',
            'password' => Hash::make('123456')
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
