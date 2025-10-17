<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;
use App\Models\Product;

class InitialDataSeeder extends Seeder
{
    public function run()
    {
        // Tipos
        $t1 = Type::create(['name' => 'Abarrotes']);
        $t2 = Type::create(['name' => 'Bebidas']);

        // Productos (ajusta precios/stock)
        $products = [
            ['name'=>'Arroz Diana 1kg','price'=>4300,'stock'=>20,'type_id'=>$t1->id],
            ['name'=>'Aceite Premier 1L','price'=>9800,'stock'=>15,'type_id'=>$t1->id],
            ['name'=>'Huevos Kike x30','price'=>16000,'stock'=>12,'type_id'=>$t1->id],
            ['name'=>'Pan Bimbo Familiar','price'=>6900,'stock'=>10,'type_id'=>$t1->id],
            ['name'=>'Azúcar Incauca 1kg','price'=>4100,'stock'=>18,'type_id'=>$t1->id],
            ['name'=>'Leche Alquería 1L','price'=>4300,'stock'=>14,'type_id'=>$t2->id],
            ['name'=>'Coca-Cola 1.5L','price'=>5400,'stock'=>25,'type_id'=>$t2->id],
            ['name'=>'Agua Brisa 600ml','price'=>2100,'stock'=>30,'type_id'=>$t2->id],
            ['name'=>'Jugo Hit 1L','price'=>4600,'stock'=>20,'type_id'=>$t2->id],
            ['name'=>'Pony Malta 330ml','price'=>2800,'stock'=>22,'type_id'=>$t2->id],
        ];

        foreach ($products as $p) {
            Product::create($p);
        }
    }
}
