<?php

namespace Database\Seeders;

use App\Models\Productos;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Productos::insert([
            [
              'id' => 1,
              'product_name' => 'Detergente',
              'description' => 'Material de limpieza',
              'unit_price' => 3.20,
              'stock'=>10,
              'warranty'=>1,
              'seller_id'=>1,
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now()
          ],
          [
            'id' => 2,
              'product_name' => 'Camisa',
              'description' => 'Ropa para damas y caballeros',
              'unit_price' => 3,
              'stock'=>5,
              'warranty'=>1,
              'seller_id'=>1,
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now()
          ],
      ]);
    }
}
