<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = App\Category::all();
        $users = App\User::all();

        if($categories->count() == 0) {
            $this->command->info("please create some categories !");
            return;
        }

        if($users->count() == 0) {
            $this->command->info("please create some users !");
            return;
        }

        $nbPosts = (int)$this->command->ask("How many of product you want generate ?", 10);

        factory(App\Product::class, $nbPosts)->make()->each(function($product) use ($categories, $users) {
            $product->category_id = $categories->random()->id;
            $product->user_id = $users->random()->id;
            $product->save();
        });
    }
}
