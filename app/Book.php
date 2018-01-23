<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'name',
        'author',
        'quantity',
        'genre',
    ];

    public function scopeSearch($query, $value)
    {
        return $query->where('name', 'LIKE', "%$value%")
            ->OrWhere('author', 'LIKE', "%$value%");
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function exchange()
    {
        return $this->hasMany('App\Exchange', 'book_id', 'id');
    }
}
