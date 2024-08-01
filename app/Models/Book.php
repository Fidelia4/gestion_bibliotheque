<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable =['title', 'author_id', 'isbn', 'published_year' ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}
