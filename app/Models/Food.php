<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'foods';
    protected $fillable = [
        'name',
        'slug',
        'price',
        'likes'
        , 'views',
        'user_id',
        'info',
        'image'

    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function Tag()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' =>
                ['source' => 'name']
        ];
    }


}
