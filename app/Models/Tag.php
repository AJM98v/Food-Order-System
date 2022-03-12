<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = ['name','slug'];
    public function sluggable(): array
    {
        return [
          'slug'=>[
              'source'=>'name'
          ]
        ];
    }
    public function Food(){
       return $this->belongsToMany(Food::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}

