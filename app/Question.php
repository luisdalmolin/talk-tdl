<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setBodyAttribute($body)
    {
        $this->attributes['body'] = strip_tags($body);
    }
}
