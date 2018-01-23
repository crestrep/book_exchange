<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    protected $table = 'exchange';

    public $timestamps = false;

    protected $dates = ['date_ini','date_end'];

    protected $fillable = [
        'book_id',
        'user_id',
        'date_ini',
        'date_end',
    ];

    public function setDateIniAttribute($value)
    {
        $this->attributes['date_ini'] = Carbon::createFromFormat('d/m/Y', $value);
    }

    public function setDateEndAttribute($value)
    {
        $this->attributes['date_end'] = Carbon::createFromFormat('d/m/Y', $value);
    }

    public function scopeSearch($query, $value)
    {
        return $query->where('name', 'LIKE', "%$value%")
            ->OrWhere('author', 'LIKE', "%$value%");
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function book()
    {
        return $this->hasMany('App\Book', 'id', 'book_id');
    }
}
