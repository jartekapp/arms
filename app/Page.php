<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'name',
    ];

    public function fields()
    {
        return $this->hasMany(Field::class)->orderBy('order', 'asc');
    }

    public function field($slug)
    {
        return $this->fields->where('slug', $slug)->first()->content;
    }
}
