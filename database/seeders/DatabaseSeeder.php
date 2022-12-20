<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Ad;
use App\Models\Advertiser;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call([
//            TagSeeder::class,
//            AdvertiserSeeder::class,
//            CategorySeeder::class,
//            AdSeeder::class,
//        ]);
        Advertiser::factory(20)->create();
        Tag::factory(20)->create();
        Category::factory(20)->create();
        Ad::factory(20)->create();

        foreach(Ad::all() as $ad)
        {
            $ad->tags()->attach(Tag::find(rand(1, 20)));
        }
    }
}
