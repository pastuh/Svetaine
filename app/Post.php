<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Post
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $slug
 * @property int $category_id
 * @property-read \App\Category $category
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereSlug($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @property string $image
 * @property string $image_blured
 * @property bool $status
 * @property int $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereImageBlured($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereUserId($value)
 */
class Post extends Model
{

    protected $table = 'posts';

    protected $fillable = [
        'title', 'body', 'slug', 'image', 'image_blured', 'image_thumb', 'category_id', 'status', 'published', 'user_id',
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
