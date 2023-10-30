<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kyslik\ColumnSortable\Sortable;

class Article extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'title',
        'description',
        'category_id',
    ];

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format('F j, Y');;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function scopeWithFirstImageUrl($query)
    {
        return $query->addSelect(['first_image_url' => Image::select('url')
            ->whereColumn('article_id', 'articles.id')
            ->oldest()
            ->take(1)
        ]);
    }
}
