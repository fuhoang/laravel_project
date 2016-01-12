<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Video extends Model
{
    protected $fillable = [
    	'title',
    	'description',
    	'published_at'
    ];

    protected $dates = ['published_at'];

    /**
     * Set the published_at attribute
     *
     * @param $date
     */
    public function setPublishedAtAttribute($date)
    {
    	$this->attributes['published_at'] = Carbon::parse($date);
    }

    /**
     * Set the published_at attribute
     *
     * @param $date
     */
    public function getPublishedAtAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }

    /**
     * Get all published videos
     *
     * @param $query
     */
    public function scopePublished($query)
    {
    	$query->where('published_at', '<=', Carbon::now());
    }


    /**
     * Get all unpublished video
     *
     * @param $query
     */
    public function scopeUnpublished($query)
    {
    	$query->where('published_at', '>=', Carbon::now());
    }

    /**
     *  An video is owned by a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the tags associated with given video
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * Get a list of tag ids associated with the current video.
     *
     * @return array
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('id')->toArray();
    }

}
