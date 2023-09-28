<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use HasFactory, Sortable;

    public $sortable = [
        'name',
        'display_order'
    ];

    protected $fillable = [
        'name',
        'display_order'
    ];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
