<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name'];

    protected $hidden = ['created_at', 'updated_at'];


    public function replies()
    {
        return $this->hasMany('App\Reply');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

}
