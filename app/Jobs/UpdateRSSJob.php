<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Feed;
use App\Models\Post;
use App\Services\RSSConnectionService;
use DB;

class UpdateRSSJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $feed;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Feed $feed)
    {
        $this->feed = $feed;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DB::beginTransaction();

        // Removes the old posts
        $posts = $this->feed->posts;
        foreach($posts as $p){
            $p->delete();
        }

        // Gets the new posts
        $service = new RSSConnectionService($this->feed->url);
        $data = $service->getCurl();

        if(!empty($data->channel->item)){
            foreach($data->channel->item as $item){
                $post = new Post;
                $post->feed_id = $this->feed->id;
                $post->title = $item->title;
                $post->description = $item->description;
                $post->link = $item->link;
                $post->save();
            }

            DB::commit();
        }
    }
}
