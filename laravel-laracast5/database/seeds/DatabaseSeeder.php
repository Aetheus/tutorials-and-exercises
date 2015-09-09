<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call(ArticleTableSeeder::class);

        Model::reguard();
    }

}

class ArticleTableSeeder extends Seeder
{
    public function run(){
        App\Article::create([
            "title" => "first article",
             "body" => "first article body",
             "published_at"=> Carbon\Carbon::now()
        ]);

        App\Article::create([
            "title" => "second article",
             "body" => "second article body",
             "published_at"=> Carbon\Carbon::now()
        ]);

        App\Article::create([
            "title" => "third article",
             "body" => "third article body",
             "published_at"=> Carbon\Carbon::now()
        ]);

        App\Article::create([
            "title" => "a future article",
             "body" => "a future article body",
             "published_at"=> Carbon\Carbon::now()->addDays(8);
        ]);

        App\Article::create([
            "title" => "another future article",
             "body" => "another future article body",
             "published_at"=> Carbon\Carbon::now()->addDays(18);
        ]);
    }
}
