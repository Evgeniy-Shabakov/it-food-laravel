<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductIngredientsSeeder extends Seeder
{
   public function run(): void
   {
      DB::table('product_base_ingredients')->insert(
         [
            [
               'product_id' => 14,
               'ingredient_id' => 1,
               'can_delete' => false,
               'can_replace' => true,
            ],
            [
               'product_id' => 14,
               'ingredient_id' => 3,
               'can_delete' => true,
               'can_replace' => true,
            ],
            [
               'product_id' => 14,
               'ingredient_id' => 7,
               'can_delete' => true,
               'can_replace' => true,
            ],
            [
               'product_id' => 14,
               'ingredient_id' => 8,
               'can_delete' => true,
               'can_replace' => true,
            ],
            [
               'product_id' => 14,
               'ingredient_id' => 9,
               'can_delete' => true,
               'can_replace' => true,
            ],
         ]
      );

      DB::table('product_base_ingredient_replacements')->insert(
         [
            [
               'product_base_ingredient_id' => 1,
               'replacement_ingredient_id' => 2,
            ],

            [
               'product_base_ingredient_id' => 2,
               'replacement_ingredient_id' => 4,
            ],
            [
               'product_base_ingredient_id' => 2,
               'replacement_ingredient_id' => 5,
            ],

            [
               'product_base_ingredient_id' => 3,
               'replacement_ingredient_id' => 6,
            ],
            [
               'product_base_ingredient_id' => 3,
               'replacement_ingredient_id' => 8,
            ],

            [
               'product_base_ingredient_id' => 4,
               'replacement_ingredient_id' => 7,
            ],
            [
               'product_base_ingredient_id' => 4,
               'replacement_ingredient_id' => 6,
            ],

            [
               'product_base_ingredient_id' => 5,
               'replacement_ingredient_id' => 10,
            ],
            [
               'product_base_ingredient_id' => 5,
               'replacement_ingredient_id' => 11,
            ],
         ]
      );

      DB::table('product_additional_ingredients')->insert(
         [
            [
               'product_id' => 14,
               'ingredient_id' => 3,
               'max_quantity' => 2,
            ],
            [
               'product_id' => 14,
               'ingredient_id' => 4,
               'max_quantity' => 2,
            ],
            [
               'product_id' => 14,
               'ingredient_id' => 5,
               'max_quantity' => 2,
            ],
            [
               'product_id' => 14,
               'ingredient_id' => 6,
               'max_quantity' => 7,
            ],
            [
               'product_id' => 14,
               'ingredient_id' => 7,
               'max_quantity' => 2,
            ],
            [
               'product_id' => 14,
               'ingredient_id' => 8,
               'max_quantity' => 2,
            ],
            [
               'product_id' => 14,
               'ingredient_id' => 9,
               'max_quantity' => 1,
            ],
            [
               'product_id' => 14,
               'ingredient_id' => 10,
               'max_quantity' => 1,
            ],
            [
               'product_id' => 14,
               'ingredient_id' => 11,
               'max_quantity' => 1,
            ],

         ]
      );
   }
}
