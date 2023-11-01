<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory(10)->create();

        Category::factory(8)
            ->create()
            ->each(function ($category) use ($tags) {

                Article::factory(mt_rand(2, 5))
                    ->create(['category_id' => $category->id])
                    ->each(function ($article) use ($tags) {

                        $article->tags()->attach($tags->random(2));

                        $path = storage_path('app/public/article/' . $article->id);
                        if (!is_dir($path)) {
                            mkdir($path);
                        }

                        $article->images()->createMany([
                            ['url' => fake()->image($path, 300, 300, null, false)],
                        ]);

                    });
            });
    }
}
