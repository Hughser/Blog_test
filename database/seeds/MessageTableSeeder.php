<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Model\Message;
use App\Model\Article;
use App\Model\User;
use Illuminate\Support\Facades\Log;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        $articleIds = Article::lists('id')->all();
        $userIds = User::lists('id')->all();
        foreach (range(1, 10) as $index) {
            Message::create([
            'article_id' => $articleIds[array_rand($articleIds, 1)],
            'user_id' => $userIds[array_rand($userIds, 1)],
            'content' => $faker->sentence,
          ]);
        }
    }
}
