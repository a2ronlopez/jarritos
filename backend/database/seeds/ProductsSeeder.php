<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'sku' => '4225-776-3234',
            'description' => 'Camiseta Dodgers',
            'quantity' => 100,
            'cost' => 1700,
            'vendor_id' =>1
        ]);
        DB::table('products')->insert([
            'sku' => '4225-776-2134',
            'description' => 'Gorra Dodgers',
            'quantity' => 150,
            'cost' => 700,
            'vendor_id' =>1
        ]);
        DB::table('products')->insert([
            'sku' => '4225-776-9852',
            'description' => 'Sudadera Dodgers',
            'quantity' => 180,
            'cost' => 1200,
            'vendor_id' =>1
        ]);
        DB::table('products')->insert([
            'sku' => '4225-852-2134',
            'description' => 'Camiseta Yankees',
            'quantity' => 150,
            'cost' => 1700,
            'vendor_id' =>2
        ]);
        DB::table('products')->insert([
            'sku' => '4225-852-2137',
            'description' => 'Gorra Yankees',
            'quantity' => 150,
            'cost' => 700,
            'vendor_id' =>2
        ]);
        DB::table('products')->insert([
            'sku' => '4225-852-9852',
            'description' => 'Sudadera Yankees',
            'quantity' => 180,
            'cost' => 1200,
            'vendor_id' =>2
        ]);
        DB::table('products')->insert([
            'sku' => '4225-666-2134',
            'description' => 'Camiseta Red Sox',
            'quantity' => 150,
            'cost' => 1700,
            'vendor_id' =>3
        ]);
        DB::table('products')->insert([
            'sku' => '4225-666-2137',
            'description' => 'Gorra Red Sox',
            'quantity' => 150,
            'cost' => 700,
            'vendor_id' =>3
        ]);
        DB::table('products')->insert([
            'sku' => '4225-666-9852',
            'description' => 'Sudadera Red SOx',
            'quantity' => 180,
            'cost' => 1200,
            'vendor_id' =>3
        ]);
    }
}
