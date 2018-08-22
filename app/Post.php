<?php

namespace App;

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'iframe', 'excerpt', 'published_at', 'category_id', ];
    protected $dates = ['published_at'];

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function category() //$post->category->name
    {
    	return $this->belongsTo(Category::class); // Un post pertenece a una categoría
    }
    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    }
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    public function scopePublished($query)
    {
        $query->whereNotNull('published_at')
            ->where('published_at', '<=', Carbon::now() )
            ->latest('published_at');
    }
    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['url']   = str_slug($title);
    }
    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at ? Carbon::parse($published_at) : null;
    }
    public function setCategoryIdAttribute($category)
    {
        $this->attributes['category_id'] = Category::find($category) ? $category : Category::create(['name' => $category])->id;
    }
    public function syncTags($tags)
    {
        $tagIds = collect($tags)->map(function($tag){
            return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        });
        
        return $this->tags()->sync($tagIds);
    }
    protected static function boot()
    {
        parent::boot();
        static::deleting(function($post){
            $post->tags()->detach();
            $post->photos->each->delete();
        });
    }
}