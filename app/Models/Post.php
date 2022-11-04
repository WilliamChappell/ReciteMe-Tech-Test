<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'feed_id',
        'title',
        'link',
        'description'
    ];

    public $timestamps = false;

    public function Feed()
    {
        return $this->hasOne(Feed::class,'feed_id');
    }
}
