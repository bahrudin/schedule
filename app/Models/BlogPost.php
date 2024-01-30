<?php

namespace App\Models;

use Coderflex\Laravisit\Concerns\CanVisit;
use Coderflex\Laravisit\Concerns\HasVisits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogPost extends Model implements CanVisit
{
    use HasFactory;
    use HasVisits;

    protected $table = 'blog_posts';
    protected $fillable = ['title','author_id','category_id','contents','is_publish','slug','published_at'];

    public function category():BelongsTo
    {
        return $this->belongsTo(BlogCategory::class,'category_id','id');
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'author_id','id');
    }
}
