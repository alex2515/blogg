<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $guarded = [];
    public function getRouteKeyName() // Model Binding
    {
    	return 'url';
    }
    public function posts()
    {
    	return $this->hasMany(Post::class);
    }
    // public function getNameAttribute($name)
    // {
    // 	return str_slug($name);
    // }
    public function setNameAttribute($name)
    {
    	$this->attributes['name'] = $name;
    	$this->attributes['url'] = str_slug($name);
    }
}
