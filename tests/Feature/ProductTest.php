<?php

namespace Tests\Feature;

use App\Category;
use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSaveProduct()
    {
        $categories = Category::all();

        $product = new Product();

        $product->name = "assus x540";
        $product->description = "16 ram, 14 puce, 500 SSD";
        $product->unit = "KG";
        $product->price = "8000";
        $product->sale_price = "8500";
        $product->status = 1;
        $product->product_quantity = "20";
        $product->meta_title = "ASSUS SERIE X";
        $product->meta_description = "ahhsen makayn f souk";
        $product->category_id = $categories->random()->id;

        $product->save();
        
        // vérifier l'égalité
        $this->assertDatabaseHas('products', [
            'name' => 'assus x540',
            'sale_price' => '8500',
            'meta_title' => 'ASSUS SERIE X',
        ]);
    }

    public function testProductStoreValide() {
        $data = [
            'name' => 'assus x540 test',
            'description' => '16 ram, 14 puce, 500 SSD test',
            'price' => '5000',
            'unit' => 'kgs',
            'category_id' => '1',
            'sale_price' => '5500',
            'status' => '1',
            'product_quantity' => '15',
            'meta_title' => 'ASSUS SERIE X test',
            'meta_description' => 'ahhsen makayn f souk test',
        ];

        $this->post('/products', $data)
             ->assertStatus(302)
             ->assertSessionHas('status');
    }
}
