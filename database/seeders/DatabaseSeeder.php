<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Author;
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
        Article::factory()
            ->count(100)
            ->afterCreating(function ($article) {
                $author = Author::factory()->make();
                $author->article_id = $article->id;
                $author->save();
            })
            ->create();
    }
}
