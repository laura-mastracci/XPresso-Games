<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Article;
use Carbon\Carbon;
use Faker\Factory as Faker;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $games = [
            [
                'title' => 'The Legend of Zelda: Breath of the Wild',
                'description' => 'Explore a vast open world in this critically acclaimed action-adventure game by Nintendo.',
                'price' => 59.99,
                'link' => 'https://www.zelda.com/breath-of-the-wild/',
            ],
            [
                'title' => 'God of War: Ragnarök',
                'description' => 'Kratos and Atreus embark on a mythic journey across Norse realms to prevent Ragnarök.',
                'price' => 69.99,
                'link' => 'https://www.playstation.com/en-us/games/god-of-war-ragnarok/',
            ],
            [
                'title' => 'Elden Ring',
                'description' => 'A dark fantasy action RPG developed by FromSoftware, featuring an open world created with George R.R. Martin.',
                'price' => 59.99,
                'link' => 'https://en.bandainamcoent.eu/elden-ring/elden-ring',
            ],
            [
                'title' => 'Hollow Knight',
                'description' => 'Descend into the depths of Hallownest in this indie metroidvania masterpiece.',
                'price' => 14.99,
                'link' => 'https://www.hollowknight.com/',
            ],
            [
                'title' => 'Red Dead Redemption 2',
                'description' => 'An epic tale of life in America’s unforgiving heartland by Rockstar Games.',
                'price' => 39.99,
                'link' => 'https://www.rockstargames.com/reddeadredemption2',
            ],
            [
                'title' => 'Minecraft',
                'description' => 'Create, explore and survive alone or with friends in this blocky sandbox universe.',
                'price' => 26.95,
                'link' => 'https://www.minecraft.net/',
            ],
            [
                'title' => 'Cyberpunk 2077',
                'description' => 'A story-driven open-world RPG set in a dystopian future where technology reigns.',
                'price' => 49.99,
                'link' => 'https://www.cyberpunk.net/',
            ],
            [
                'title' => 'Stardew Valley',
                'description' => 'Escape the city and build the farm of your dreams in this indie life simulator.',
                'price' => 13.99,
                'link' => 'https://www.stardewvalley.net/',
            ],
            [
                'title' => 'The Witcher 3: Wild Hunt',
                'description' => 'A story-rich RPG with a massive world and unforgettable characters. Be the Witcher.',
                'price' => 29.99,
                'link' => 'https://thewitcher.com/en/witcher3',
            ],
            [
                'title' => 'Animal Crossing: New Horizons',
                'description' => 'Build your island paradise and enjoy the relaxing charm of this Nintendo life sim.',
                'price' => 59.99,
                'link' => 'https://www.animal-crossing.com/new-horizons/',
            ],
        ];


        foreach ($games as $game) {

            Article::create([
                'title' => $game['title'],
                'description' => $game['description'],
                'price' => $game['price'],
                'link' => $game['link'],
                'category_id' => rand(1, 5),
                'user_id' => rand(1, 3),
                'is_accepted' => rand(0, 1),
                'created_at' => Carbon::now()->subDays(rand(1, 300)),
                'updated_at' => Carbon::now(),
                'hot' => rand(0, 1),
            ]);


        }
    }
}
