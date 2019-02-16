<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // protected $table = 'tb_artikel';
    // protected $fillable = =['title', 'content', 'user_id', 'slug'];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
