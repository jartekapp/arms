<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'type',
        'content',
    ];

    protected $casts = [
        'content' => 'array',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function getContentAttribute($value)
    {
        return json_decode($value);
    }
}
