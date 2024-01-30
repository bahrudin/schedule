<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogCategory extends Model
{
    use HasFactory;
    protected $table = 'blog_categories';
    protected $guarded = [];
    protected $fillable = [
        'name',
//        'slug',
        'descriptions',
        'sort_order',
    ];

    public function posts():HasMany
    {
        return $this->hasMany(BlogPost::class);
    }

}
