<?php

use Illuminate\Database\Seeder;

class VendorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendors')->insert([
            'rfc' => 'ABC 680524 P-76',
            'name' => 'Los Angeles Dodgers',
            'phone' => '485-2121',
            'address' => '1000 Vin Scully Ave, Los Angeles, CA 90012, Estados Unidos'
        ]);
        DB::table('vendors')->insert([
            'rfc' => 'ABC 680524 P-79',
            'name' => ' New York Yankees',
            'phone' => '718 -2121',
            'address' => '1 E 161 St, The Bronx, NY 10451, Estados Unidos'
        ]);
        DB::table('vendors')->insert([
            'rfc' => 'ABC 680524 P-71',
            'name' => 'Boston Red Sox',
            'phone' => '877-733-7699',
            'address' => '4 Jersey St, Boston, MA 02215, Estados Unidos'
        ]);
    }
}
