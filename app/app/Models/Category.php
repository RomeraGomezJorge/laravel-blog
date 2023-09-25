<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}
