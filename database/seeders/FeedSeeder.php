<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feed;
use DB;

class FeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feeds')->insert([
            'name' => "CNN",
            'url' => "http://rss.cnn.com/rss/cnn_topstories.rss",
            'udpated_at' => null
        ]);

        DB::table('feeds')->insert([
            'name' => "Huffington Post",
            'url' => "https://www.huffpost.com/section/front-page/feed",
            'udpated_at' => null
        ]);
    }
}
