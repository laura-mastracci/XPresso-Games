<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Prize;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $categories = [
        'azione',
        'arcade ',
        'sport',
        'educativo',
        'picchiaduro'
    ];
    public $prizes = [
        [
            'name' => 'cupon del 40%!',
            'description' => 'Sconto del 40% su ordini superiori a 150€ usa il codice : CoinDiscount40'
        ],
        [
            'name' => 'cupon del 25%!',
            'description' => 'Sconto del 25% su ordini superiori a 50€ usa il codice : CoinDiscount25 '
        ],
        [
            'name' => 'Gioco in Alpha!',
            'description' => 'Ti è riservata la possibilità di giocare un gioco a tua scelta in alpha'
        ]
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        foreach ($this->categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        foreach ($this->prizes as $prize) {
            Prize::create([
                'name' => $prize['name'],
                'description' => $prize['description']
            ]);
        }
        $this->call([
            UserSeeder::class,
            ArticleSeeder::class,
            DiscountSeeder::class
            
        ]);
    }
}
