<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Todo extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['title', 'description', 'user_id', 'completed'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
