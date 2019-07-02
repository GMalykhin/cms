<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'title', 'path',
    ];

    protected $path = '/images/';

    public function user()
    {
        return $this->morphedByMany('App\User', 'imageable');
    }

    protected function getTitleAttribute($image) #<-- Accessor getColumnNameAttribute#
    {
        return $this->path . $image;
    }

}
