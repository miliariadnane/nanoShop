<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = App\Product::all();

        $users = App\User::all();

        if($products->count() == 0) {
            $this->command->info("please create some products !");
            return;
        }
        
        $nbComments = (int)$this->command->ask("How many of comment you want generate ?", 100);

        factory(App\Comment::class, $nbComments)->make()->each(function($comment) use ($products, $users) {
            $comment->product_id = $products->random()->id;
            $comment->user_id = $users->random()->id;
            $comment->save();
        });
    }
}
