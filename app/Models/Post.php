<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $appends = [
        'full_cover_image'
    ];

    public function getFullCoverImage() 
    {
        if($this->cover_image) {
            return asset(`storage/ . $this->cover_image`);
        }
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
