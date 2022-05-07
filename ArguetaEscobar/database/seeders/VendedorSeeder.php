<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendedor;
use Illuminate\Database\Seeder;

class VendedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendedores = [
            [
                'dui'=>'123456789',
                'address'=>'Calle 1, El Salvador',
                'nit'=>'06141234561116',
                'id_usuario'=>User::where('email', 'vendedor1@test.com')->first()->id,
            ],
            [
                'dui'=>'543219876',
                'address'=>'Calle 2, El Salvador',
                'nit'=>'06141234561116',
                'id_usuario'=>User::where('email', 'vendedor2@test.com')->first()->id,
            ],
            [
                'dui'=>'543219876',
                'address'=>'Calle 3, El Salvador',
                'nit'=>'06141234561116',
                'id_usuario'=>User::where('email', 'vendedor3@test.com')->first()->id,
            ]
        ];
        foreach ($vendedores as $v) {
            Vendedor::create($v);
        }
    }
}
