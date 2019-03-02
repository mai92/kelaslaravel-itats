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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getImage()
    {
        if ($this->image && $this->image !== "") {
            return asset('images/' . $this->image);
        }

        return "https://dummyimage.com/750x300/000/fff&text=Ga+Punya+Gambar";
    }
}
