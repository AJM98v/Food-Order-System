<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = [
        'name',
        'slug',
        'image'
    ];
    public function sluggable(): array
    {
        return[
            'slug'=>[
                'source'=>'name'
            ]
        ];
    }

    public function Foods(){
      return  $this->belongsToMany(Food::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}

