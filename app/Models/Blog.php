<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Blog extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = [
        'user_id',
        'blog_category_id',
        'title',
        'description',
        'slug',
        'status',
    ];   
    
    public function BlogCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
