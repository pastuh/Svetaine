<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animals';

    protected $fillable = [
        'title', 'slug', 'lt_title', 'body', 'body_2', 'published', 'main_image', 'info_image', 'status'
    ];

    public function map() {
        return $this->belongsToMany('App\Map');
    }

}
