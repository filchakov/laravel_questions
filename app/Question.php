<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'text', 'user_id', 'is_delete'];

    protected $hidden = ['created_at', 'updated_at'];

    public function replies()
    {
        return $this->hasMany('App\Reply');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
