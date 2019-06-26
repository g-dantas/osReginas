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
        DB::table('tipo_usuarios')->insert([
           'id_tp_usuario' => 1,
           'desc_tp_usuario' => 'Administrador'
        ]);

        DB::table('tipo_usuarios')->insert([
           'id_tp_usuario' => 2,
           'desc_tp_usuario' => 'Usuário'
        ]);

        DB::table('departamentos')->insert([
           'id_depto' => 1,
           'desc_depto' => 'CPD'
        ]);

        DB::table('status_os')->insert([
            'id_status' => 1,
            'desc_status' => 'OS ABERTA'
        ]);

        DB::table('status_os')->insert([
            'id_status' => 2,
            'desc_status' => 'EM ATENDIMENTO'
        ]);

        DB::table('status_os')->insert([
            'id_status' => 3,
            'desc_status' => 'AGUARDANDO COMPRA DE PEÇAS'
        ]);

        DB::table('status_os')->insert([
            'id_status' => 4,
            'desc_status' => 'OS FINALIZADA(AGUARDANDO CONFIRMAÇÃO DO USUÁRIO)'
        ]);

        DB::table('status_os')->insert([
            'id_status' => 5,
            'desc_status' => 'OS FINALIZADA'
        ]);

        DB::table('status_os')->insert([
            'id_status' => 6,
            'desc_status' => 'OS CANCELADA'
        ]);

        DB::table('users')->insert([
            'id_tp_usuario' => 1,
            'id_departamento' => 1,
            'name' => 'CPD',
            'login' => 'admin',
            'usuario_ativo' => 'S',
            'password' => Hash::make('admin')
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
