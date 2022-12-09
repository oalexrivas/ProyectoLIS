<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Usuario
        DB::table('users')->insert([
            'name' => 'Omar Rivas',
            'email' => 'oalexander.rivas@gmail.com',
            'password' => '$2y$10$3PP4pZqo.MISJuOa7O8vUu4mEJ1G8Dcr5nHfTTTUVl6byYvnWgSBW'
        ]);

        //Tipos de Cuentas
        DB::table('tiposcuentas')->insert([
            'nombre' => 'Cuentas Personales',
            'user_id' => 1
        ]);

        DB::table('tiposcuentas')->insert([
            'nombre' => 'Cuentas Empresariales',
            'user_id' => 1
        ]);

        DB::table('tiposcuentas')->insert([
            'nombre' => 'Cuentas de Ahorros',
            'user_id' => 1
        ]);

        //Tipos de Transacciones
        DB::table('tipostransacciones')->insert([
            'nombre' => 'Salario',
            'signo' => '1',
            'user_id' => 1
        ]);

        DB::table('tipostransacciones')->insert([
            'nombre' => 'Pago Electricidad',
            'signo' => '-1',
            'user_id' => 1
        ]);

        //Formas de Pago
        DB::table('formaspagos')->insert([
                'nombre' => 'Efectivo',
                'user_id' => 1
        ]);

        DB::table('formaspagos')->insert([
            'nombre' => 'Cheque',
            'user_id' => 1
        ]);
    }
}
