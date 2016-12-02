<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $userIds = \App\Model\User::lists('id')->all();
        $tagIds = \App\Model\Tag::lists('id')->all();
        $categoryIds = \App\Model\Category::lists('id')->all();

        foreach (range(1, 10) as $index) {
            $body=$faker->paragraph(20);
            $article = \App\Model\Article::create([
                'title' => $faker->sentence,
                'body' => $body,
                'html_body'=>$body,
                'click' => $faker->numberBetween(100, 9000),
                'category_id' => $faker->randomElement($categoryIds),
                'user_id' => $faker->randomElement($userIds),
                'created_at' => $faker->dateTimeThisYear(),
                'updated_at' => $faker->dateTimeThisYear(),
                'deleted_at' => $faker->optional(0.1)->dateTimeThisYear(),
            ]);

            $tags = $faker->randomElements($tagIds, 2);

            $article->tag()->sync($tags);
        }
    }
}
