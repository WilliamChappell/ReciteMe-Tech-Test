<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    protected $fillable = [
        'name',
        'url',
        'updated_at',
    ];

    public $timestamps = false;

    public function Posts()
    {
        return $this->hasMany(Post::class,'feed_id','id');
    }
}
