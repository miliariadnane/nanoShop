<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = App\Type::all();

        if($types->count() == 0) {
            $this->command->info("please create some categorie types !");
            return;
        }

        $nbPosts = (int)$this->command->ask("How many of categories you want generate ?", 6);

        factory(App\Category::class, $nbPosts)->make()->each(function($category) use ($types) {
            $category->type_id = $types->random()->id;
            $category->save();
        });
    }
}
