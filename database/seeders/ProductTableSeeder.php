<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product1 = Product::create([
            'name' => 'Fruit Bowl',
            'calories' => 832,
            'price' => 28.90,
        ]);
        $product1->categories()->sync([1]);
        $product1->ingredients()->sync([1,2]);
        $product1->addMedia("database/seeders/product_images/fruit-bowl.png")->preservingOriginal()->toMediaCollection('photo');
        // $product1->addMediaFromUrl('https://sushidaily.com/media/2kqljj3h/salmon-poke_top-view_bowl.jpg?width=SushiDaily.Domain.ViewModels.Shared.SrcSetData&quality=80')->toMediaCollection('photo');
        
        $product2 = Product::create([
            'name' => 'Colourful Vegan',
            'calories' => 417,
            'price' => 28.90,
        ]);
        $product2->categories()->sync([1]);
        $product2->ingredients()->sync([3,4,5]);
        $product2->addMedia("database/seeders/product_images/colourful-vegan.png")->preservingOriginal()->toMediaCollection('photo');
        // $product2->addMediaFromUrl('https://sushidaily.com/media/2kqljj3h/salmon-poke_top-view_bowl.jpg?width=SushiDaily.Domain.ViewModels.Shared.SrcSetData&quality=80')->toMediaCollection('photo');
        
        $product3 = Product::create([
            'name' => 'Chicken Teriyakki Bowl',
            'calories' => 540,
            'price' => 28.90,
        ]);
        $product3->categories()->sync([1]);
        $product3->ingredients()->sync([6,7]);
        $product3->addMedia("database/seeders/product_images/teriyakki-chicken-bowl.png")->preservingOriginal()->toMediaCollection('photo');
        // $product3->addMediaFromUrl('https://sushidaily.com/media/2kqljj3h/salmon-poke_top-view_bowl.jpg?width=SushiDaily.Domain.ViewModels.Shared.SrcSetData&quality=80')->toMediaCollection('photo');
        
        $product4 = Product::create([
            'name' => 'Almond Butter Tofu',
            'calories' => 520,
            'price' => 28.90,
        ]);
        $product4->categories()->sync([1]);
        $product4->ingredients()->sync([8]);
        $product4->addMedia("database/seeders/product_images/almond-butter-tofu.png")->preservingOriginal()->toMediaCollection('photo');
        // $product4->addMediaFromUrl('https://sushidaily.com/media/2kqljj3h/salmon-poke_top-view_bowl.jpg?width=SushiDaily.Domain.ViewModels.Shared.SrcSetData&quality=80')->toMediaCollection('photo');

        $juices = [
            [
                'name' => 'Apple Juice',
                'calories' => 832,
                'price' => 6.00,
            ],
            [
                'name' => 'Orange Juice',
                'calories' => 417,
                'price' => 6.00,
            ],
            [
                'name' => 'Watermelon Juice',
                'calories' => 540,
                'price' => 6.00,
            ],
            [
                'name' => 'Banane Juice',
                'calories' => 520,
                'price' => 6.00,
            ],
        ];

        foreach ($juices as $juice) {
            $ingredient = Product::create($juice);
            $ingredient->categories()->sync([2]);
            $ingredient->addMediaFromUrl('https://st5.depositphotos.com/12902820/66216/i/450/depositphotos_662168852-stock-photo-refreshing-layered-summer-watermelon-drink.jpg')->toMediaCollection('photo');
        }
    }
}
