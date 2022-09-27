<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\user;
use File;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. LEER EL ARCHIVO DE DATOS
        $json = File::get('database/_data/users.json');

        // 2. CONVERTIR LOS DATOS EN UN ARREGLO
        $arreglo_usuarios = json_decode($json);

        // 3. RECORRER EL ARREGLO
        //var_dump($arreglo_usuarios);
        foreach($arreglo_usuarios as $usuario){
            // 4. REGISTRAR EL USUARIO EN BASE DE DATOS
            // SE UTILIZA EL METODO ::CREATE

            User::create([
                "name" => $usuario->name,
                "email" => $usuario->email,
                "password" => Hash::make($usuario->password)
            ]);

        }
        //UN <<entity>>
    }
}
