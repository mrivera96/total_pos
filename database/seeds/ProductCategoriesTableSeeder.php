<?php

use Illuminate\Database\Seeder;
use App\ProductCategory;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $papeleria = new ProductCategory();
        $papeleria->description = 'Papelería';
        $impresion = new ProductCategory();
        $impresion->description = 'Impresión';

        $papeleria->save();
        $impresion->save();
    }
}
