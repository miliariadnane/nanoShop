<?php

use App\Product;
use App\Tag;
use Illuminate\Database\Seeder;

class ProductTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagsCount = Tag::count();

        Product::all()->each(function($product) use($tagsCount){
            
            $take = random_int(1, $tagsCount);

            $tagsIds = Tag::inRandomOrder()->take($take)->get()->pluck('id');

            $product->tags()->sync($tagsIds);
            
        });
    }
}
