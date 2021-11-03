<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'title',
        'type',
        'price',
        'quantity',
        'releaseDate',
        'author_id',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
