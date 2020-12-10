<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title', 'description', 'user_id', 'completed'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
