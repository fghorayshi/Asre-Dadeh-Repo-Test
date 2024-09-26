<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'blog_id',
        'is_read',
        'description',
        'status',
    ];   
    
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
