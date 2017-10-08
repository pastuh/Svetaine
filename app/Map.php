<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{

    protected $fillable = [
        'title', 'slug', 'sub_title', 'body', 'body_2', 'published', 'main_image', 'info_image', 'status'
    ];

    public function animals() {
        return $this->belongsToMany('App\Animal');
    }
}
