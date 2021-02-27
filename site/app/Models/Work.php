<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelLike\Traits\Liker;
use Overtrue\LaravelLike\Traits\Likeable;

class Work extends Model
{
    use HasFactory;
    use Liker;
    use Likeable;

    protected $guarded=[];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
