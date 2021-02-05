<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use IlLuminate\Support\Str;

class Entry extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value)
    {
    	$this->attributes['title'] = $value;
    	$this->attributes['slug'] = Str::slug($value);
    }

    public function getUrl()
    {
    	return url("entradas/$this->slug-$this->id");
    }
}
