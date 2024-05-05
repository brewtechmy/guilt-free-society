<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\IngredientCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IngredientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Base
        $bases = [
            [
                'name' => 'Greens',
                'quantity' => 40,
                'protein' => 1.1,
                'carbohydrate' => 2.3,
                'fat' => 0.3
            ],
            [
                'name' => 'White Rice',
                'quantity' => 210,
                'protein' => 5.6,
                'carbohydrate' => 59,
                'fat' => 0.6
            ],
            [
                'name' => 'Brown Rice',
                'quantity' => 210,
                'protein' => 4.9,
                'carbohydrate' => 49,
                'fat' => 1.7
            ],
            [
                'name' => 'Mash Potatoes',
                'quantity' => 200,
                'protein' => 3.9,
                'carbohydrate' => 34,
                'fat' => 8.4
            ],
            [
                'name' => 'Seaweed Rice',
                'quantity' => 210,
                'protein' => 5.9,
                'carbohydrate' => 59.3,
                'fat' => 0.6
            ],
            [
                'name' => 'Cauliflower Rice',
                'quantity' => 120,
                'protein' => 2.3,
                'carbohydrate' => 6,
                'fat' => 0.3
            ],
            [
                'name' => 'Soba Noodles',
                'quantity' => 120,
                'protein' => 6.1,
                'carbohydrate' => 26,
                'fat' => 0.1
            ],
            [
                'name' => 'Quinoa',
                'quantity' => 90,
                'protein' => 4.4,
                'carbohydrate' => 21,
                'fat' => 1.9
            ],
            [
                'name' => 'Konjac Noodles',
                'quantity' => 120,
                'protein' => 0.1,
                'carbohydrate' => 0.1,
                'fat' => 0.1
            ],
        ];

        $baseId = IngredientCategory::insertGetId(['name' => 'Base']);

        foreach ($bases as $base) {
            $ingredient = Ingredient::create($base);
            $ingredient->categories()->sync([$baseId]);
            $ingredient->addMedia("database/seeders/ingredient_images/white-rice.png")->preservingOriginal()->toMediaCollection('photo');
            // $ingredient->addMediaFromUrl('https://st4.depositphotos.com/24022680/38137/i/450/depositphotos_381374504-stock-photo-basmati-white-rice-solid-texture.jpg')->toMediaCollection('photo');
        }

        // Protein
        $proteins = [
            [
                'name' => 'Grilled Chicken',
                'quantity' => 70,
                'protein' => 21.53,
                'carbohydrate' => 0,
                'fat' => 2.48,
            ],
            [
                'name' => 'Tofu',
                'quantity' => 120,
                'protein' => 14.1,
                'carbohydrate' => 9.9,
                'fat' => 5.6,
            ],
            [
                'name' => 'Tempeh',
                'quantity' => 50,
                'protein' => 9.1,
                'carbohydrate' => 4.68,
                'fat' => 5.69,
            ],
            [
                'name' => 'Magic Mushroom',
                'quantity' => 80,
                'protein' => 4,
                'carbohydrate' => 24,
                'fat' => 10.4,
            ],
            [
                'name' => 'Sichuan Eggplant',
                'quantity' => 150,
                'protein' => 1.6,
                'carbohydrate' => 13,
                'fat' => 3.8,
            ],
            [
                'name' => 'Grilled Smoked Duck',
                'quantity' => 50,
                'protein' => 8,
                'carbohydrate' => 1,
                'fat' => 6,
            ],
            [
                'name' => 'Grilled Shrimp',
                'quantity' => 50,
                'protein' => 11,
                'carbohydrate' => 0.8,
                'fat' => 0.8,
            ],
            [
                'name' => 'Grilled Beef',
                'quantity' => 50,
                'protein' => 13,
                'carbohydrate' => 0,
                'fat' => 9,
            ],
            [
                'name' => 'Maguro Tuna',
                'quantity' => 40,
                'protein' => 11.69,
                'carbohydrate' => 0,
                'fat' => 0.48,
            ],
            [
                'name' => 'Shoyu Salmon',
                'quantity' => 40,
                'protein' => 7,
                'carbohydrate' => 0.4,
                'fat' => 3.3,
            ],
            [
                'name' => 'Pan Seared Salmon',
                'quantity' => 50,
                'protein' => 7.7,
                'carbohydrate' => 0.8,
                'fat' => 6.9,
            ],
            [
                'name' => 'Aburi Salmon Mentai',
                'quantity' => 40,
                'protein' => 10.81,
                'carbohydrate' => 0,
                'fat' => 2.96,
            ],
            [
                'name' => 'Unagi',
                'quantity' => 90,
                'protein' => 21,
                'carbohydrate' => 0,
                'fat' => 13,
            ],
            [
                'name' => 'Garlic Chicken',
                'quantity' => 70,
                'protein' => 2.3,
                'carbohydrate' => 2.3,
                'fat' => 4.3,
            ],
            [
                'name' => '0il Free Steamed Herbs Chicken',
                'quantity' => 80,
                'protein' => 0.8,
                'carbohydrate' => 17.6,
                'fat' => 4,
            ],
        ];

        $proteinId = IngredientCategory::insertGetId(['name' => 'Protein']);

        foreach ($proteins as $protein) {
            $ingredient = Ingredient::create($protein);
            $ingredient->categories()->sync([$proteinId]);
            $ingredient->addMedia("database/seeders/ingredient_images/grilled-chicken.png")->preservingOriginal()->toMediaCollection('photo');
            // $ingredient->addMediaFromUrl('https://media.istockphoto.com/id/172900971/photo/grilled-chicken.jpg?s=612x612&w=0&k=20&c=crqZAq_4tr_dw4EGng9YvWWFAsh8VzotdETySHFUMzw=')->toMediaCollection('photo');
        }

        // Sides
        $sides = [
            [
                'name' => 'Japanese Cucumber',
                'quantity' => 30,
                'protein' => 2,
                'carbohydrate' => 11,
                'fat' => 0,
            ],
            [
                'name' => 'Boiled Egg',
                'quantity' => 50,
                'protein' => 6.29,
                'carbohydrate' => 0.56,
                'fat' => 5.3,
            ],
            [
                'name' => 'Red Cabbage',
                'quantity' => 15,
                'protein' => 0.2,
                'carbohydrate' => 1,
                'fat' => 0,
            ],
            [
                'name' => 'Carrot',
                'quantity' => 15,
                'protein' => 0.1,
                'carbohydrate' => 1,
                'fat' => 0,
            ],
            [
                'name' => 'Herbs Tomatoes',
                'quantity' => 50,
                'protein' => 0.6,
                'carbohydrate' => 3.5,
                'fat' => 0.1,
            ],
            [
                'name' => 'Onion',
                'quantity' => 20,
                'protein' => 0.2,
                'carbohydrate' => 2,
                'fat' => 0,
            ],
            [
                'name' => 'Sweet Corn',
                'quantity' => 30,
                'protein' => 1,
                'carbohydrate' => 6,
                'fat' => 0.4,
            ],
            [
                'name' => 'Chickpeas',
                'quantity' => 20,
                'protein' => 2,
                'carbohydrate' => 5,
                'fat' => 0.5,
            ],
            [
                'name' => 'Cherry Tomatoes',
                'quantity' => 15,
                'protein' => 0.13,
                'carbohydrate' => 0.59,
                'fat' => 0.03,
            ],
            [
                'name' => 'Edamame',
                'quantity' => 20,
                'protein' => 2,
                'carbohydrate' => 2,
                'fat' => 1,
            ],
            [
                'name' => 'Wakame',
                'quantity' => 15,
                'protein' => 0.45,
                'carbohydrate' => 1.37,
                'fat' => 0.1,
            ],
            [
                'name' => 'Pickled Radish',
                'quantity' => 20,
                'protein' => 0.1,
                'carbohydrate' => 0.7,
                'fat' => 0,
            ],
            [
                'name' => 'Guacamole',
                'quantity' => 15,
                'protein' => 0.29,
                'carbohydrate' => 1.28,
                'fat' => 2.15,
            ],
            [
                'name' => 'Salsa',
                'quantity' => 20,
                'protein' => 0.3,
                'carbohydrate' => 1,
                'fat' => 0,
            ],
            [
                'name' => 'Lady Finger',
                'quantity' => 20,
                'protein' => 0.4,
                'carbohydrate' => 1.41,
                'fat' => 0.02,
            ],
            [
                'name' => 'Dragon Fruit',
                'quantity' => 20,
                'protein' => 0.2,
                'carbohydrate' => 2.9,
                'fat' => 0.1,
            ],
            [
                'name' => 'Spinach',
                'quantity' => 25,
                'protein' => 0.8,
                'carbohydrate' => 1,
                'fat' => 0.1,
            ],
            [
                'name' => 'Mango',
                'quantity' => 20,
                'protein' => 0.1,
                'carbohydrate' => 3.4,
                'fat' => 0.05,
            ],
            [
                'name' => 'Baked Potatoes',
                'quantity' => 50,
                'protein' => 4,
                'carbohydrate' => 25,
                'fat' => 2.5,
            ],
            [
                'name' => 'Baked Pumpkin',
                'quantity' => 50,
                'protein' => 0.9,
                'carbohydrate' => 6,
                'fat' => 0.6,
            ],
            [
                'name' => 'Fried Cauliflower',
                'quantity' => 50,
                'protein' => 2,
                'carbohydrate' => 11,
                'fat' => 6.4,
            ],
            [
                'name' => 'Sweet Potatoes Chips',
                'quantity' => 15,
                'protein' => 0,
                'carbohydrate' => 3,
                'fat' => 1.1,
            ],
            [
                'name' => 'Sauted Mushroom',
                'quantity' => 30,
                'protein' => 0.5,
                'carbohydrate' => 1.5,
                'fat' => 2.6,
            ],
            [
                'name' => 'Kimchi',
                'quantity' => 30,
                'protein' => 0.3,
                'carbohydrate' => 0.7,
                'fat' => 0.1,
            ],
            [
                'name' => 'Beetroot Hummus',
                'quantity' => 35,
                'protein' => 2,
                'carbohydrate' => 6,
                'fat' => 7.5,
            ],
        ];

        $sideId = IngredientCategory::insertGetId(['name' => 'Sides']);

        foreach ($sides as $side) {
            $ingredient = Ingredient::create($side);
            $ingredient->categories()->sync([$sideId]);
            $ingredient->addMedia("database/seeders/ingredient_images/cherry-tomatoes.png")->preservingOriginal()->toMediaCollection('photo');
            // $ingredient->addMediaFromUrl('https://media.istockphoto.com/id/471644399/photo/fresh-japanese-cucumbers.jpg?s=612x612&w=0&k=20&c=aLLEFoIM8vGrrwinio4ID3TMoswcT4kPuHzTefVlRGA=')->toMediaCollection('photo');
        }

        // Toppings
        $toppings = [
            [
                'name' => 'Kazami Nori',
                'quantity' => 5,
                'protein' => 0.3,
                'carbohydrate' => 0.3,
                'fat' => 2,
            ],
            [
                'name' => 'Ebiko',
                'quantity' => 2,
                'protein' => 0.3,
                'carbohydrate' => 0,
                'fat' => 0,
            ],
            [
                'name' => 'Wasabi',
                'quantity' => 1,
                'protein' => 0,
                'carbohydrate' => 0.8,
                'fat' => 0,
            ],
            [
                'name' => 'Spring Onion',
                'quantity' => 1,
                'protein' => 0,
                'carbohydrate' => 0,
                'fat' => 0,
            ],
            [
                'name' => 'Lime',
                'quantity' => 5,
                'protein' => 0,
                'carbohydrate' => 0.5,
                'fat' => 0,
            ],
            [
                'name' => 'Fried Garlic',
                'quantity' => 5,
                'protein' => 0.3,
                'carbohydrate' => 1.7,
                'fat' => 0,
            ],
            [
                'name' => 'Crouton',
                'quantity' => 2,
                'protein' => 0.2,
                'carbohydrate' => 1.3,
                'fat' => 0.4,
            ],
            [
                'name' => 'Wantan Skin',
                'quantity' => 5,
                'protein' => 0.7,
                'carbohydrate' => 1.6,
                'fat' => 0.3,
            ],
            [
                'name' => 'Chili Flakes',
                'quantity' => 1,
                'protein' => 0.1,
                'carbohydrate' => 0.6,
                'fat' => 0.2,
            ],
            [
                'name' => 'Sesame Seed',
                'quantity' => 2,
                'protein' => 0.47,
                'carbohydrate' => 1.2,
                'fat' => 0.99,
            ],
            [
                'name' => 'Pumpkin Seed',
                'quantity' => 2,
                'protein' => 0.5,
                'carbohydrate' => 0.1,
                'fat' => 0.8,
            ],
            [
                'name' => 'Sunflower Seed',
                'quantity' => 2,
                'protein' => 0.46,
                'carbohydrate' => 0.38,
                'fat' => 0.99,
            ],
            [
                'name' => 'Chia Seed',
                'quantity' => 2,
                'protein' => 0.31,
                'carbohydrate' => 0.88,
                'fat' => 0.62,
            ],
            [
                'name' => 'Almond Nut',
                'quantity' => 4,
                'protein' => 0.85,
                'carbohydrate' => 0.79,
                'fat' => 0.62,
            ],
            [
                'name' => 'Cashew Nut',
                'quantity' => 4,
                'protein' => 1,
                'carbohydrate' => 1,
                'fat' => 2,
            ],
            [
                'name' => 'Granola',
                'quantity' => 3,
                'protein' => 0.4,
                'carbohydrate' => 1.6,
                'fat' => 0.7,
            ],
            [
                'name' => 'Corn Flakes',
                'quantity' => 5,
                'protein' => 0,
                'carbohydrate' => 4,
                'fat' => 0,
            ],
            [
                'name' => 'Coconut Flakes',
                'quantity' => 2,
                'protein' => 0.07,
                'carbohydrate' => 0.95,
                'fat' => 0.64,
            ],
            [
                'name' => 'Goji Berry',
                'quantity' => 3,
                'protein' => 0.3,
                'carbohydrate' => 2.1,
                'fat' => 0.1,
            ],
            [
                'name' => 'Raisins',
                'quantity' => 5,
                'protein' => 0.2,
                'carbohydrate' => 4,
                'fat' => 0,
            ],
        ];

        $toppingId = IngredientCategory::insertGetId(['name' => 'Toppings']);

        foreach ($toppings as $topping) {
            $ingredient = Ingredient::create($topping);
            $ingredient->categories()->sync([$toppingId]);
            $ingredient->addMedia("database/seeders/ingredient_images/spring-onion.png")->preservingOriginal()->toMediaCollection('photo');
            // $ingredient->addMediaFromUrl('https://kanikab2b.com.my/image/cache/catalog/htb1rgl4jcuybunksmryq6aa3pxae-500x500.webp')->toMediaCollection('photo');
        }

        // Sauce
        $sauces = [
            [
                'name' => 'Balsamic Lime Vinaigrette',
                'quantity' => 20,
                'protein' => 0.1,
                'carbohydrate' => 3.4,
                'fat' => 0,
            ],
            [
                'name' => 'Lemon Garlic Aioli',
                'quantity' => 30,
                'protein' => 1.1,
                'carbohydrate' => 1.7,
                'fat' => 3.9,
            ],
            [
                'name' => 'Teriyaki Pineapple',
                'quantity' => 50,
                'protein' => 2.96,
                'carbohydrate' => 7.98,
                'fat' => 0,
            ],
            [
                'name' => 'Wasabi Mayo',
                'quantity' => 30,
                'protein' => 0,
                'carbohydrate' => 5,
                'fat' => 16,
            ],
            [
                'name' => 'Almond Butter',
                'quantity' => 50,
                'protein' => 7.54,
                'carbohydrate' => 10.61,
                'fat' => 29.55,
            ],
            [
                'name' => 'Thai Sauce',
                'quantity' => 50,
                'protein' => 1,
                'carbohydrate' => 13,
                'fat' => 0.2,
            ],
            [
                'name' => 'Asam Pedas',
                'quantity' => 50,
                'protein' => 1.1,
                'carbohydrate' => 14.2,
                'fat' => 7,
            ],
            [
                'name' => 'Super Sambal',
                'quantity' => 50,
                'protein' => 59,
                'carbohydrate' => 131,
                'fat' => 81,
            ],
            [
                'name' => 'Curry',
                'quantity' => 50,
                'protein' => 0.6,
                'carbohydrate' => 3.9,
                'fat' => 4.6,
            ],
            [
                'name' => 'Sriracha sauce',
                'quantity' => 30,
                'protein' => 9,
                'carbohydrate' => 2,
                'fat' => 22,
            ],
        ];

        $sauceId = IngredientCategory::insertGetId(['name' => 'Sauce']);

        foreach ($sauces as $sauce) {
            $ingredient = Ingredient::create($sauce);
            $ingredient->categories()->sync([$sauceId]);
            $ingredient->addMedia("database/seeders/ingredient_images/almond-butter.png")->preservingOriginal()->toMediaCollection('photo');
            // $ingredient->addMediaFromUrl('https://img.freepik.com/premium-photo/top-view-wasabi-mayo-wooden-bowl-isolated-white-background_865659-19576.jpg')->toMediaCollection('photo');
        }
    }
}
